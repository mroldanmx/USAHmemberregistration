/**
 * resources/js/app.js
 *
 * to be ran with:
 *      npm run dev
 */

window.$ = require('jquery');
window.moment = require('moment');


//step 1's sections.c
const question_wrappers = $('.question-wrapper');
const question_history = [];

const render_questions = (position) => {
    $(`.question-wrapper`).hide();
    $(`[data-order=${position}]`).show();
};

const load_last_position = () => {
    //TODO load which question was the last the user answered
    return $(window.location.hash).data('order') || 0;
};

const is_first = (position) => {
    return !question_wrappers[position - 1];
};

const is_last = (position) => {
    return !question_wrappers[position + 1];
};

const update_navigation = (position) => {
    if (is_first(position)) {
        $('.js-prev-btn').hide();
        $('.js-next-btn').show();
    } else if (is_last(position)) {
        $('.js-prev-btn').show();
        $('.js-next-btn').hide();
        $('.js-last-btn').show();
    } else {
        $('.js-prev-btn').show();
        $('.js-next-btn').show();
        $('.js-last-btn').hide();
    }
    window.location.hash = $(`[data-order=${position}]`).attr('id');
};


//main program
let current_position = load_last_position();

const current_section = (position = current_position) => $(`[data-order=${position}]`).attr('id');
const get_section_position = section => $(`#${section}`).data('order') || current_position;

const registration = () => {

    const form_data = $('form#registration-form').serializeArray();
    const my_reg = {
        current_position,
        current_section: current_section()
    };
    for (let field of form_data) {
        my_reg[field.name] = field.value;
    }

    return my_reg;
};

const show_position = (position) => {
    update_navigation(position);
    render_questions(position);
};

const update_position = () => {
    //TODO remove hard-code

    const my_reg = registration();

    if (my_reg.member_type != 3 && "who" == current_section()) {
        current_position += get_section_position();
    } else {
        current_position++;
    }
};

const next_question = async () => {
    const answer = await validate_answers(current_position);

    if (!answer) {
        return false;
    }

    update_position();
    show_position(current_position);
};

window.next_question = next_question;

const prev_question = () => {
    current_position--;
    show_position(current_position);
};

const validate_answers = (position) => {
    return new Promise((resolve) => {
        let selected_value = null;

        if (current_section(position) == 'personal') {
            const day = $('[name=dob-day]').val();
            const month = $('[name=dob-month]').val();
            const year = $('[name=dob-year]').val();

            if (!is_over_18(day, month, year)) {
                alert()
            }
        }

        //validate required input/selector in current question wrapper.
        $('input[required], select[required]', `[data-order=${position}]`).each((index, selector) => {
            selected_value = $(selector).val().trim();
            if (!selected_value) {
                alert($(selector).data('requiredMessage'));
                resolve(false);
            }
        });

        $('input[type="checkbox"]', `[data-order=${position}]`).each((index, selector) => {
            selected_value = $(selector).is(":checked");

            if (!selected_value) {
                alert($(selector).data('requiredMessage') || 'Please check your information');
                resolve(false);
            }
        });

        resolve(selected_value);

    });
};

const is_over_18 = (day,month,year)=>{
    const years = moment().diff(`${year}-${month}-${day}`, 'years');
    return years >= 18;
};


$(document).ready(function () {
    show_position(current_position);
});

$(document).on('click', '.js-prev-btn', function () {
    prev_question();
});

$(document).on('click', '.js-next-btn', function (e) {
    next_question();
});


//show the Membership requirements when the user changes selection
$(document).on('change', '[name="member_type"]', function () {
    const member_type = $(this).val();

    $('#membership-requirements-checkbox').show();

    $('#membership-requirements-checkbox').removeAttr('checked');

    //hide all terms
    $('.js-membership-requirement').hide();

    //show terms of the selected membership
    $(`[data-term-id=${member_type}]`).show();

    if (member_type == 3) {
        $('.js-child').addClass('hidden');
    } else {
        $('.js-child').removeClass('hidden');
    }
});

$(document).on('change', 'input[name="who"]', function () {
    const registration_type = $(this).val();
    switch (registration_type) {
        case '3':
            if (!confirm('Each registrant must be present to acknowledge waivers.')) {
                $('input[name="who"]').prop('checked', false);
            }
            break;

        case '4':
            if (!confirm("Each person being registered needs to be present to accept the USA Hockey Waiver of Liability and the USA Hockey Concussion Information and Acknowledgement. Also, be sure to provide each person's correct mailing address and personal email address so that confirmation of registration can be delivered. ")) {
                $('input[name="who"]').prop('checked', false);
            }
            break;
    }
});

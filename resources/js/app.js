/**
 * resources/js/app.js
 *
 * to be ran with:
 *      npm run dev
 */

window.$ = require('jquery');

//step 1's sections.c
const question_wrappers = $('.question-wrapper');

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

const show_position = (position) => {
    update_navigation(position);
    render_questions(position);
};


const next_question = () => {
    if (!validate_answers(current_position)) {
        return;
    }
    current_position++;
    show_position(current_position);
};

const prev_question = () => {
    current_position--;
    show_position(current_position);
};

const validate_answers = (position) => {
    //validate required input/selector in current question wrapper.
    $('input[required], select[required]', `[data-position=${position}]`).each((index, selector) => {
        if (!$(selector).val().trim()) {
            alert($(this).data('errorMessage'));
            return false;
        }
    });

    return true;
};


$(document).ready(function () {
    show_position(current_position);
});

$(document).on('click', '.js-prev-btn', function () {
    prev_question();
});

$(document).on('click', '.js-next-btn', function () {
    next_question();
});
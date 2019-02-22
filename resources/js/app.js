/**
 * resources/js/app.js
 *
 * to be ran with:
 *      npm run dev
 */

import $ from 'jquery';
import './registration';
import address_autocomplete from "./address_autocomplete";


//show the Membership requirements when the user changes selection
$(document).on('change', '[name="member_type_id"]', function () {
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

$(document).on('click', '.js-go-back', function (e) {
    e.preventDefault();
    window.history.back();
});


$(document).on('focusout', '.js-zipcode', async function () {
    const location = await address_autocomplete($(this).val());

    for (let key in location) {
        console.log(key, location[key]);
        $(`[name="${key}"]`).val(location[key]);
    }
});


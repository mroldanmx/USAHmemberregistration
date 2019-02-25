/**
 * resources/js/app.js
 *
 * to be ran with:
 *      npm run dev
 */

import $ from 'jquery';
import './registration';
import address_autocomplete from "./address_autocomplete";

const toggle_terms_visibility = (member_type) => {
    //hide all terms
    $('.js-membership-requirement').hide();

    //show terms of the selected membership
    $(`[data-term-id=${member_type}]`).show();
}

//show the Membership requirements when the user changes selection
$(document).on('change', '[name="will_donate"]', function () {
    const val = parseInt($(this).val());
    console.log({val})
    if (val) {
        $('#donations').show();
    }else{
        $('#donations').hide();
    }
});

$(document).on('change', '[name="member_type_id"]', function () {
    const member_type = $(this).val();

    $('#membership-requirements-checkbox').show();

    $('#membership-requirements-checkbox').removeAttr('checked');

    toggle_terms_visibility(member_type);

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


$(document).on('focusout', '.js-zipcode', async function () {
    const location = await address_autocomplete($(this).val());

    for (let key in location) {
        $(`[name="${key}"]`).val(location[key]);
    }
});

$(document).ready(function(){
    //restore previously selected member type
    let member_type_input = $('[type=radio][checked]');

    if (member_type_input.length) {
        member_type_input.trigger('change');
    }

    //restore previously selected member type
    let donation_type_input = $('[name="will_donate"][checked]');

    if (donation_type_input.length) {
        donation_type_input.trigger('change');
    }

    if ($('#verify').length) {
        $(document).ready(function(){
            $('#form-container').addClass('expanded');
        });
    }

    if ($('#payment').length) {
        $(document).ready(function(){
            $('#form-container').addClass('medium');
        });
    }

    if ($('#confirmation').length) {
        $(document).ready(function(){
            $('#form-container').addClass('medium');
        });
    }

    if ($('#player-price').length) {
        $('.player-price-holder').html($('#player-price').html())
    }
});

$(document).on('click','.use-same-address',function(){
    if ($(this).is(':checked') && address) {
        for(let key in address){
            $(`input#${key}`).val(address[key]);
        }
    }
});




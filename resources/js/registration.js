import $ from 'jquery';

$('form#registrationForm').on('submit', function () {
    const dob = $(this).find('[name="dob"]');
    if(dob){
        const year = $('[name="dob_year"]').val();
        const month = $('[name="dob_month"]').val();
        const day = $('[name="dob_day"]').val();
        dob.val(`${year}-${month}-${day}`);
    }
});
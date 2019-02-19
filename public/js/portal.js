function bootstrapAlert(message, type) {
    var html = `
    <div class="alert alert-` + type + ` alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button> 
        ` + message + `
     </div>
    `;
    $('section.content').find('.alert').remove();
    $('section.content').prepend(html);
};

function showFieldErrors(errors) {
    $.each(errors, function(key, errors) {
        var span = $('<span />').attr('class', 'help-block').html($.isArray(errors) ? errors[0] : errors);
        $('input[name="'+key+'"]').closest('*[class^="col-"]').append(span);
        $('input[name="'+key+'"]').closest('.form-group').addClass('has-error');
    });
}
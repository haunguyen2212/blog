let INQUIRY = {};
let loading = $('.loading');
let success = $('.sent-message');
let error = $('.error-message');

INQUIRY.init = function(){
    INQUIRY.save();
}

INQUIRY.save = function(){
    $('#submit').click(function(){
        let form = $('#frm-inquiry');
        let url = form.attr('action');
        let formData = new FormData(form[0]);
        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){
                $('.text-danger.error').html('')
                loading.addClass('d-block');
                success.removeClass('d-block');
                error.removeClass('d-block');
                $('#submit').hide();
            },
            complete: function(){
                loading.removeClass('d-block');
                $('#submit').show();
            },
            success: function(res){
                form.find('input[type=text], input[type=email], textarea').val('');
                success.addClass('d-block');
            },
            error: function(err){
                let errors = err.responseJSON.errors;
                $.each(errors, function(prefix, val){
                    $('#' + prefix).closest('.form-group').find('.text-danger.error').html(val);
                });
                error.addClass('d-block');
            }
        })
    })
}

$(document).ready(function(){
    INQUIRY.init();
})
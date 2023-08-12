let POST_CREATE = {};
let form_create = $('#form-create');

POST_CREATE.init = function(){
    POST_CREATE.save();
}

POST_CREATE.save = function(){
    $('#btn-save').click(function(e){
        e.preventDefault();
        let content = tinymce.activeEditor.getContent();
        let formData = new FormData(form_create[0]);
        formData.set('content', content);
        let url = form_create.attr('action');
        $.ajax({
            type: 'post',
            url: url,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){
                $('.text-danger.errors').html('')
            },
            success: function(res){
                if(res.status){
                    window.location.reload();
                }
            },
            error: function(err){
                let errors = err.responseJSON.errors;
                $.each(errors, function(prefix, val){
                    $('#' + prefix).closest('.form-group').find('.text-danger.errors').html(val);
                });
            }
        })
    });
}

$(document).ready(function(){
    POST_CREATE.init();
})
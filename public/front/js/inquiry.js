let INQUIRY = {};

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
            success: function(res){
                console.log(res);
            }
        })
    })
}

$(document).ready(function(){
    INQUIRY.init();
})
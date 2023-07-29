$('#search-post').keyup(function(event){
    if (event.code === 'Enter')
    {
        event.preventDefault();
        $(this).closest('form').submit();
    }
});
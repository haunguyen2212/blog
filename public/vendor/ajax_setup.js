// Get the CSRF token value from the meta tag
var csrfToken = $('meta[name="csrf-token"]').attr('content');

// Set the CSRF token in the headers of all AJAX requests
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': csrfToken 
    }
});
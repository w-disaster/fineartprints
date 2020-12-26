$(document).ready(function () {
    $('#toggle_hidden_pass').click(function () {
        $('#password').attr('type', $('#password').is(':password') ? 'text' : 'password');
        if ($('#password').attr('type') === 'password') {
            $('#toggle_hidden_pass > img').attr('src', "./assets/icons/eye.svg");
        } else {
            $('#toggle_hidden_pass > img').attr('src', "./assets/icons/eye-slash.svg");
        }
    });
});
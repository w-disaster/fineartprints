$(document).ready(function () {
    $("#toggle-hidden-pass").click(function () {
        $("#password").attr("type", $("#password").is(":password") ? "text" : "password");
        if ($("#password").attr("type") === "password") {
            $("#toggle_hidden_pass > img").attr("src", "upload/icons/eye.svg");
        } else {
            $("#toggle_hidden_pass > img").attr("src", "upload/icons/eye-slash.svg");
        }
    });
});
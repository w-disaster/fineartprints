$(document).ready(function () {
    $("#toggle-hidden-pass").click(function () {
        $("#password").attr("type", $("#password").is(":password") ? "text" : "password");
        if ($("#password").attr("type") === "password") {
            $("#toggle-hidden-pass > img").attr("src", "upload/icons/eye.svg");
        } else {
            $("#toggle-hidden-pass > img").attr("src", "upload/icons/eye-slash.svg");
        }
    });
});
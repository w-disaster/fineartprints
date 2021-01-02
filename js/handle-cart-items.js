$(document).ready(function() {
    $("div.card").find("button").click(function() {
        $(this).closest("div.card").remove();
    });
});
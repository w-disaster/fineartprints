function hideElement(element) {
    element
        .removeClass("selected")
        .next().slideUp();
}

$(document).ready(function() {
    $("div.accordion > button").click(function() {

        if ($(this).hasClass("selected")) {
            hideElement($(this));
        } else {
            hideElement($("div.accordion > button.selected"));
            $(this)
                .addClass("selected")
                .next()
                .slideDown();
        }
    });
});
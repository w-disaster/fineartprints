function hideElement(element) {
    element
        .removeClass("selected")
        .next().slideUp();
}

$(document).ready(function() {
    $("div.accordion > button").click(function() {
        //console.log("Button clicked!");
        // per riferirsi al bottone su cui si è cliccato si impiega `this`
        //console.log($(this).text());
        //$(this).next().slideToggle();

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
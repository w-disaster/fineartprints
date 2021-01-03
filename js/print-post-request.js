$(document).ready(function() {

    const inputWidth = $("input#inputWidth");
    const inputHeight = $("input#inputHeight");
    const techniqueChoice = $("button#technique-choice ~ div");
    const frameChoice = $("button#frame-choice ~ div");
    const passpartoutChoice = $("button#passpartout-choice ~ div");
    const cartBadge = $("span#cart-item-count");

    let title, height, width, techniqueId, frameId, passpartoutId, currentItemCount;

    $("div.row > div.col-md-4").find("button").first().click(function() {
        update_session();
    });

    function update_session() {
        title = $("div.row > div.col-md-4").find("h2").first().text();
        width = parseFloat(inputWidth.val());
        height = parseFloat(inputHeight.val());
        techniqueId = techniqueChoice.find("span.media-body > span.h5").text();
        frameId = frameChoice.find("span.media-body > span.h5").text();
        passpartoutId = passpartoutChoice.find("span.media-body > span.h5").text();

        $.ajax({
            type: "POST",
            url: "api-cart.php",
            data: {
                "title" : title,
                "width" : width,
                "height" : height,
                "technique_id" : techniqueId,
                "frame_id" : frameId,
                "passpartout_id" : passpartoutId
            },
            success:function() {
                addItemToCart();
            }
        })
    }

    function addItemToCart() {
        currentItemCount = parseInt(cartBadge.text(), 10);
        currentItemCount++;
        cartBadge.text(currentItemCount);
    }
});

$(document).ready(function() {

    const inputWidth = $("input#inputWidth");
    const inputHeight = $("input#inputHeight");
    const techniqueChoice = $("button#technique-choice > span");
    const frameChoice = $("button#frame-choice > span");
    const passpartoutChoice = $("button#passpartout-choice > span");
    const cartBadge = $("span#cart-item-count");

    let title, height, width, techniqueId, frameId, passpartoutId, currentItemCount;

    $("div.row > div.col-md-4").find("button").first().click(function() {
        update_session();
    });

    function update_session() {
        title = $("div.row > div.col-md-4").find("h2").first().text();
        width = parseFloat(inputWidth.val());
        height = parseFloat(inputHeight.val());

        techniqueId = techniqueChoice.find("span.media-body > span.h5").first();
        frameId = frameChoice.find("span.media-body > span.h5").first();
        passpartoutId = passpartoutChoice.find("span.media-body > span.h5").first();

        console.log(techniqueChoice);
        console.log(techniqueChoice.find("span.media-body"));
        if (techniqueId.length <= 0) {
            techniqueId = "none";
        } else {
            techniqueId = techniqueId.text();
        }

        if (frameId.length <= 0) {
            frameId = "none";
        } else {
            frameId = frameId.text();
        }

        if (passpartoutId.length <= 0) {
            passpartoutId = "none";
        } else {
            passpartoutId = passpartoutId.text();
        }

        console.log(techniqueId);
        console.log(frameId);
        console.log(passpartoutId);

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

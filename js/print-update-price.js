$(document).ready(function(){

    let title = $("div.row > div.col-md-4").find("h2").first().text().trim();
    title = title.replace(" ","%20");

    let requestId, priceDivider, basePrice, basePriceDiscounted, framePrice, passpartoutPrice, techniquePrice, height, width, techniqueId, frameId, passpartoutId, currentItemCount, defaultHeight, defaultWidth, maxHeight, maxWidth;

    const fullPrice = $("p#price");
    const priceDiscounted = $("p#price-discounted");
    const inputWidth = $("input#inputWidth");
    const inputHeight = $("input#inputHeight");
    const techniqueChoice = $("button#technique-choice ~ div");
    const frameChoice = $("button#frame-choice ~ div");
    const passpartoutChoice = $("button#passpartout-choice ~ div");
    const cartBadge = $("span#cart-item-count");

    width = parseFloat(inputWidth.val());
    height = parseFloat(inputHeight.val());

    basePrice = 0.0;
    basePriceDiscounted = 0.0;
    techniquePrice = 0.0;
    framePrice = 0.0;
    passpartoutPrice = 0.0;
    techniqueId = 0;
    frameId = 0;
    passpartoutId = 0;

    requestId = 1;

    $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + requestId, function(data){
        basePrice = data["price"];

        if(data["discounted-price"] != 0) {
            basePriceDiscounted = basePrice - data["discounted-price"];
        }
        priceDivider = data["price-divider"];
        defaultWidth = data["default-width"];
        defaultHeight = data["default-height"];
        maxHeight = data["max-height"];
        maxWidth = data["max-width"];
    });

    $("div.accordion > div > button").click(function() {
        let choice = $(this);
        console.log(techniqueChoice.prev().text());
        if (techniqueChoice.find(choice).length > 0) {
            if(techniqueChoice.prev().text().trim() == "none") {
                techniquePrice = 0.0;
                techniqueId = 0;
                updatePrice();
            } else {
                requestId = 2;
                techniqueId = choice.find("span.media-body > span.h5").text();
                $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + requestId + "&technique_id=" + techniqueId, function(data){
                    techniquePrice = data[0].Price_per_cm2;
                    updatePrice();
                });
            }
        } else if (frameChoice.find(choice).length > 0) {
            if(frameChoice.prev().text().trim() == "none") {
                framePrice = 0.0;
                frameId = 0;
                updatePrice();
            } else {
                requestId = 3;
                frameId = choice.find("span.media-body > span.h5").text();
                $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + requestId + "&frame_id=" + frameId, function(data){
                    framePrice = data[0].Price;
                    updatePrice();
                });
            }
        } else if (passpartoutChoice.find(choice).length > 0) {
            if(passpartoutChoice.prev().text().trim() == "none") {
                passpartoutPrice = 0.0;
                passpartoutId = 0;
                updatePrice();
            } else {
                requestId = 4;
                passpartoutId = choice.find("span.media-body > span.h5").text();
                $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + requestId + "&passpartout_id=" + passpartoutId, function(data){
                    passpartoutPrice = data[0].Price_per_cm2;
                    updatePrice();
                });
            }
        }
    });

    $("input#inputWidth, input#inputHeight").change(function() {
        width = parseFloat(inputWidth.val());
        height = parseFloat(inputHeight.val());

        if (width < defaultWidth) {
            width = defaultWidth;
        } else if(width > maxWidth) {
            width = maxWidth;
        }

        if (height < defaultHeight) {
            height = defaultHeight;
        } else if(height > maxHeight) {
            height = maxHeight;
        }

        updatePrice();
    });

    $("div.row > div.col-md-4").find("button").first().click(function() {
        update_session();
    });

    function updatePrice() {

        let delta = ((basePrice * priceDivider) + techniquePrice + passpartoutPrice).toPrecision(6);
        let updatedPrice = basePrice + framePrice + delta * (height + width);

        if(priceDiscounted.length > 0) {
            let deltaDiscounted = (basePriceDiscounted * priceDivider) + techniquePrice + passpartoutPrice;
            let updatedDiscountedPrice = basePriceDiscounted + framePrice + deltaDiscounted * (height + width);   
            
            fullPrice.html('<p id="price" class="text-muted h3 mb-4 mr-2"><del>' + updatedPrice.toFixed(2) + " €</del></p>");
            priceDiscounted.text(updatedDiscountedPrice.toFixed(2) + " €");
        } else {
            fullPrice.text(updatedPrice.toFixed(2) + " €");
        }
        
        /*console.log("priceDivider: " + priceDivider);
        console.log("height: " + height);
        console.log("width: " + width);
        console.log("techniquePrice: " + techniquePrice);
        console.log("framePrice: " + framePrice);
        console.log("passpartoutPrice: " + passpartoutPrice);
        console.log("delta: " + delta);
        console.log("basePrice: " + basePrice);
        console.log("basePriceDiscounted: " + basePriceDiscounted);
        console.log("framePrice: " + framePrice);
        console.log("updatedPrice: " + updatedPrice);*/
    }

    function update_session() {
        /*console.log(techniqueId);
        console.log(frameId);
        console.log(passpartoutId);*/
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

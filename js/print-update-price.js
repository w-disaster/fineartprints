$(document).ready(function(){

    let title = $(this).attr('title');
    const substring = title.replace(/.*-/, '');
    title = title.replace(" -" + substring, "");
    title = title.replace(" ","%20");

    let request_id, additiveConstant, subtractiveConstant, basePrice, basePriceDiscounted, framePrice, passpartoutPrice, techniquePrice, height, width;

    basePrice = 0.0;
    basePriceDiscounted = 0.0;
    height = 10.0;
    width = 10.0;
    techniquePrice = 0.0;
    framePrice = 0.0;
    passpartoutPrice = 0.0;
    
    const fullPrice = $("p#price");
    const priceDiscounted = $("p#price-discounted");
    const inputWidth = $("input#inputWidth");
    const inputHeight = $("input#inputHeight");
    const techniqueChoice = $("button#technique-choice ~ div");
    const frameChoice = $("button#frame-choice ~ div");
    const passpartoutChoice = $("button#passpartout-choice ~ div");

    request_id = 1;

    $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + request_id, function(data){
        basePrice = data["price"];
        basePriceDiscounted = basePrice - data["discounted-price"];
        additiveConstant = data["additive-constant"];
        subtractiveConstant = data["subtractive-constant"];
    });

    $("div.accordion > div > button").click(function() {
        let choice = $(this);
        let value = choice.find("span.media-body > span.h5").text();

        if (techniqueChoice.find(choice).length > 0) {
            request_id = 2;

            $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + request_id + "&technique_id=" + value, function(data){
                techniquePrice = data[0].Price_per_cm2;
                updatePrice();
            });

        } else if (frameChoice.find(choice).length > 0) {
            request_id = 3;
            
            $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + request_id + "&frame_id=" + value, function(data){
                framePrice = data[0].Price;
                updatePrice();
            });

        } else if (passpartoutChoice.find(choice).length > 0) {
            request_id = 4;

            $.getJSON("api-print-customization.php?title=" + title + "&request_id=" + request_id + "&passpartout_id=" + value, function(data){
                passpartoutPrice = data[0].Price_per_cm2;
                updatePrice();
            });
        }
    });

    $("input#inputWidth, input#inputHeight").change(function() {
        width = parseFloat(inputWidth.val());
        height = parseFloat(inputHeight.val());
        updatePrice();
    });

    function updatePrice() {
        
        let total = (height + width).toPrecision(4);
        let delta = ((basePrice * additiveConstant) + techniquePrice + passpartoutPrice).toPrecision(6);
        let updatedPrice = basePrice + framePrice + delta * (height + width);
        
        if(typeof(priceDiscounted) != undefined) {
            let deltaDiscounted = (basePriceDiscounted * additiveConstant) + techniquePrice + passpartoutPrice;
            let updatedDiscountedPrice = basePriceDiscounted + framePrice + deltaDiscounted * (height + width);   
            
            fullPrice.html('<p id="price" class="text-muted h3 mb-4 mr-2"><del>' + updatedPrice.toFixed(2) + " €</del></p>");
            priceDiscounted.text(updatedDiscountedPrice.toFixed(2) + " €");
        } else {
            fullPrice.text(updatedPrice.toFixed(2) + " €");
        }
        
        /*console.log("additiveConstant: " + additiveConstant);
        console.log("height: " + height);
        console.log("width: " + width);
        console.log("techniquePrice: " + techniquePrice);
        console.log("framePrice: " + framePrice);
        console.log("passpartoutPrice: " + passpartoutPrice);
        console.log(total);
        console.log("delta: " + delta);
        console.log("basePrice: " + basePrice);
        console.log("basePriceDiscounted: " + basePriceDiscounted);
        console.log("framePrice: " + framePrice);
        console.log("updatedPrice: " + updatedPrice);
        console.log("updatedDiscountedPrice: " + updatedDiscountedPrice);*/
    }    
});


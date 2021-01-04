function updateShippingCosts(value){
    const option = $("option").filter(function() {
        return $(this).val() == value;
    });
    const optionHTML = option.html().split("- ")[1];
    const shippingCost = optionHTML.substring(0, optionHTML.length -1);

    $("#shipping-cost-summary").html(shippingCost);

    $("#total-order-cost > h4").html(parseFloat($("#total-order-cost > h4").html()) + parseFloat(shippingCost));
}


$(document).ready(function(){

    updateShippingCosts($('#shipper-input').val());

    $("#altCardRadio").click(function(){
        $(".payment-form").removeClass("d-none")
    });

    $("#defaultCardRadio").click(function(){
        $(".payment-form").addClass("d-none");
    });

    $("#altShippingAddress").click(function(){
        $(".shipping-form").removeClass("d-none")
    });

    $("#defaultShippingAddress").click(function(){
        $(".shipping-form").addClass("d-none");
    });

    // Credit card
    $(".btn-add-credit-card").click(function(){

        const owner = $("#creditCardOwner");
        const number = $("#creditCardNumber");
        const expire_date = $("#creditCardExpireDate");
        const numberInputField = $("#altCardNumber");
        
        numberInputField.removeClass("d-none");

        $.getJSON("api-add-credit-card.php?owner=" + owner.val() + "&number=" + number.val() + "&expire_date=" + expire_date.val(), function(result){
            if(result){
                numberInputField.val(number);
            } else{
                numberInputField.val("Card not valid");
            }
        });

        owner.val("");
        number.val("");
        expire_date.val("");
    });


    $('#shipper-input').change(function() {
        updateShippingCosts($(this).val());
    });
});
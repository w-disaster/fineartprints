function updateShippingCosts(value){
    const option = $("option").filter(function() {
        return $(this).val() == value;
    });
    
    const optionHTML = option.html().split("- ")[1];
    const shippingCost = optionHTML.substring(0, optionHTML.length -1);

    $("#shipping-cost-summary").html(shippingCost + " €");
    const articles_total_cost = $("#articles-total-cost > h5").html().split("€")[0];

    $("#total-order-cost").html("<h4>" + parseFloat(articles_total_cost) + parseFloat(shippingCost) + " €</h4>");
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
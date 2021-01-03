


$(document).ready(function(){

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
        const owner = $("#credit_card_owner").val();
        const number = $("#credit_card_number").val();
        const expire_date = $("#credit_card_expire_date").val();
        console.log(owner + " " + number + " " + expire_date);

        $.getJSON("api-add-credit-card.php?owner=" + owner + "&number=" + number + "&expire_date=" + expire_date, function(result){
            console.log(result);
            if(result == true){
                console.log("ci siamo");
                $("#altPaymentRadioLabel").innerHTML = number;
                $("#altCardRadio").val(number);

           }
        });
    });


});
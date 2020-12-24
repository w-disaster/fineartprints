$(document).ready(function(){

    $("#altCard").click(function(){
        $(".payment-form").removeClass("d-none")
    });

    $("#defaultCard").click(function(){
        $(".payment-form").addClass("d-none");
    });

    $("#altShippingAddress").click(function(){
        $(".shipping-form").removeClass("d-none")
    });

    $("#defaultShippingAddress").click(function(){
        $(".shipping-form").addClass("d-none");
    });

});
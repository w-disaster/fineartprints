$(document).ready(function() {

    const cartBadge = $("span#cart-item-count");
    let currentItemCount, id;

    $("div.card").find("div > button").click(function() {
        id = $(this).parent().prev().find("div.card-body > p").first().text().trim();
        //removeItemFromSession();
    });

    function removeItemFromSession() {
        $.ajax({
            type: "POST",
            url: "api-cart.php",
            data: {
                "id" : id,
                "action" : 0
            },
            success:function() {
                $(this).closest("div.card").remove();
                removeItemFromCart();
            }
        })
    }

    function removeItemFromCart() {
        currentItemCount = parseInt(cartBadge.text(), 10);
        currentItemCount--;
        cartBadge.text(currentItemCount);
    }
});
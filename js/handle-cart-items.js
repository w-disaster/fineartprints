$(document).ready(function() {

    const cartBadge = $("span#cart-item-count");
    let currentItemCount, id;

    $("div.card").find("div > button").click(function() {
        id = $(this).parent().prev().find("div.card-body > p").first().text().trim();
        id = parseInt(id.replace("Print id: ", ""), 10);
        $(this).closest("div.card").remove();
        removeItemFromSession();
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
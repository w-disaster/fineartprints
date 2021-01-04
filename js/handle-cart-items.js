$(document).ready(function() {

    const cartBadge = $("span#cart-item-count");

    $("div.card").find("button").click(function() {
        $(this).closest("div.card").remove();
        removeItemFromSession();
    });

    function removeItemFromSession() {
    }

    function removeItemFromCart() {
        currentItemCount = parseInt(cartBadge.text(), 10);
        currentItemCount++;
        cartBadge.text(currentItemCount);
    }
});
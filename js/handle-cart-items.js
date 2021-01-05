$(document).ready(function() {

    const cartBadge = $("span#cart-item-count");
    let currentItemCount, id, text, price, totalPrice;
    totalPrice = 0.0;

    showTotalPrice();

    $("div.card").find("div > button").click(function() {
        id = $(this).parent().prev().find("div.card-body > p").first().text().trim();
        id = parseInt(id.replace("Print id: ", ""), 10);
        $(this).closest("div.card").remove();
        removeItemFromSession();
        showTotalPrice();
    });

    function removeItemFromSession() {
        $.ajax({
            type: "POST",
            url: "api-cart.php",
            data: {
                "print_id" : id,
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

        if(currentItemCount == 0) {
            showTextForEmptyCart();
        }
    }

    function showTextForEmptyCart() {
        text = `<p class="mt-3 lead ml-2">The cart is empty, <a href="api-shop.php">let's explore the shop</a>.</p>`;
        $("div.rounded-pill:first").after(text);
    }

    function showTotalPrice() {
        totalPrice = 0.0;
        $("div.card").find("p.h5").each(function(_index, elem) {
            price = elem.innerHTML.trim();
            price = price.replace("Price: ", "");
            price = price.replace(" €", "");
            price = parseFloat(price);
            totalPrice += price;
        })
        console.log(totalPrice);
        $("div.rounded-pill:last").html("Total price: " + totalPrice.toFixed(2) + "€");
    }

});
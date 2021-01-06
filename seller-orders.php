<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {

    $templateParams["title"] = "Seller Area - View orders";
    $templateParams["name"] = "seller-orders-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";
    $email = htmlspecialchars($_SESSION["email"]);
    $templateParams["orders"] = $dbh->getMyOrders($email);

    if(isset($_GET["order_id"])) {
        $templateParams["order_selected"] = true;
        $order_id = htmlspecialchars($_GET["order_id"]);
        $order = $dbh->getOrderProducts($order_id)[0];

        if(isset($_POST["order_id"])) {

            $ship_city = htmlspecialchars($_POST["ship_city"]);
            $ship_postal_code = htmlspecialchars($_POST["ship_postal_code"]);
            $ship_address = htmlspecialchars($_POST["ship_address"]);
            $order_date = htmlspecialchars($_POST["order_date"]);
            $shipped_date = htmlspecialchars($_POST["shipped_date"]);
            $card_number = htmlspecialchars($_POST["card_number"]);
            $shipper_name = htmlspecialchars($_POST["shipper_name"]);
            $status = htmlspecialchars($_POST["status"]);

            $parameters = array(
                "ship_city" => $ship_city,
                "ship_postal_code" => $ship_postal_code,
                "ship_address" => $ship_address,
                "order_date" => $order_date,
                "shipped_date" => $shipped_date,
                "email" => $email,
                "card_number" => $card_number,
                "shipper_name" => $shipper_name,
                "status" => $status
            );

            $dbh->updatePicture($parameters);
        }

    } else {
        $templateParams["order_selected"] =  false;
    }

} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
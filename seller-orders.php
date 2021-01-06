<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {

    $templateParams["title"] = "Seller Area - View orders";
    $templateParams["name"] = "seller-orders-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";
    $email = htmlspecialchars($_SESSION["email"]);
    $templateParams["orders"] = $dbh->getOrdersBySeller($email);

    if(isset($_GET["order_id"])) {
        $templateParams["order_selected"] = true;
        $order_id = htmlspecialchars($_GET["order_id"]);
        $order = $dbh->getOrderById($order_id);

        if(empty($order)) {
            $templateParams["order_selected"] =  false;
        } else {
            $order = $order[0];
            $order["Total_amount"] = $dbh->getTotalAmountFromOrder($order_id)[0]["Total_amount"];
            $order["Number_prints_ordered"] = $dbh->getNumberPrintsOrdered($order_id)[0]["Number_prints_ordered"];
        }
    } else {
        $templateParams["order_selected"] =  false;
    }
} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Customer orders";
$templateParams["nome"] = "customer-orders-template.php";

$ship="All";
$date=1000;
if (isset($_POST["ship_option"])) {
    $ship = $_POST["ship_option"];
}
if (isset($_POST["date_option"])) {
    $date = $_POST["date_option"];
}
$templateParams["orders"] = $dbh->getMyOrders($ship, $date);
$templateParams["products"] = $dbh->getOrderProducts(); 
require 'template/base.php';
?>
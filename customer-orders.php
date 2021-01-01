<?php
require_once 'bootstrap.php';

$templateParams["title"] = "Customer orders";
$templateParams["name"] = "customer-orders-template.php";

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
$templateParams["notifications"] = $dbh->getNotifications();
$i = 0;
foreach($templateParams["notifications"] as $nots): $i++; endforeach;
if(isset($_POST["notif"]) && !is_null($_POST["notif"])) {
    
    $dbh->clearNotifications();
    $i = 0;
    $templateParams["notifications"] = $dbh->getNotifications();
}
require 'template/base.php';
?>
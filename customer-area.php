<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Customer area";
$templateParams["nome"] = "customer-area-template.php";

$templateParams["personal_info"] = $dbh->getCustomer();

if (isset($_POST["name"])) {
    $dbh->updateCustomer($_POST["email"], $_POST["birth_date"], $_POST["password"], $_POST["name"], $_POST["surname"], 
$_POST["phone"], $_POST["city"], $_POST["postal_code"], $_POST["province"], $_POST["address"]);
    $templateParams["personal_info"] = $dbh->getCustomer();
}

$templateParams["pay_info"] = $dbh->getPaymentInfo();

if (isset($_POST["remove_number"])) {
    $dbh->deletePaymentInfo($_POST["remove_number"]);
    $templateParams["pay_info"] = $dbh->getPaymentInfo();
}

if (isset($_POST["add_number"])) {
    $dbh->addPaymentInfo($_POST["add_number"]);
    $templateParams["pay_info"] = $dbh->getPaymentInfo();
}

require 'template/base.php';
?>
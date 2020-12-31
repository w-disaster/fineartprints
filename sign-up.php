<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Sign-up";
$templateParams["nome"] = "sign-up-template.php";
$isnamevalid = "";
$issurnamevalid = "";
$ispasswordvalid = "";
$isconfpwvalid = "";
$isemailvalid = "";
$isphonevalid = "";
if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"]) &&
isset($_POST["confirm-password"]) && isset($_POST["email"]) && isset($_POST["phone"]) &&
isset($_POST["birth-date"]) && isset($_POST["city"]) && isset($_POST["address"]) &&
isset($_POST["postal-code"]) && isset($_POST["province"])) {
    if (!preg_match("/^([a-zA-Z' ]+)$/", $_POST["name"])) {
        $isnamevalid = "is-invalid";
    } else if (!preg_match("/^([a-zA-Z' ]+)$/", $_POST["surname"])) {
        $issurnamevalid = "is-invalid";
    } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["password"])) {
        $ispasswordvalid = "is-invalid";
    } else if ($_POST["password"] != $_POST["confirm-password"]) {
        $isconfpwvalid = "is-invalid";
    } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
        $isemailvalid = "is-invalid";
    } else if (!is_numeric($_POST["phone"]) || strlen($_POST["phone"]) < 9 || strlen($_POST["phone"]) > 10) {
        $isphonevalid = "is-invalid";
    } else {
        $dbh->addCustomer($_POST["email"], $_POST["birth-date"], $_POST["password"], $_POST["name"], $_POST["surname"], 
        $_POST["phone"], $_POST["city"], $_POST["postal-code"], $_POST["province"], $_POST["address"]);
    }
}

require 'template/base.php';
?>
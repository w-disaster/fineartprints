<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Sign-up";
$templateParams["nome"] = "sign-up-template.php";

if (isset($_POST["name"])) {
    $dbh->insertNewCustomer($_POST["email"], $_POST["birth_date"], $_POST["password"], $_POST["name"], $_POST["surname"], 
$_POST["phone"], $_POST["city"], $_POST["postal_code"], $_POST["province"], $_POST["address"]);

}

require 'template/base.php';
?>
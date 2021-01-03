<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

/*
if(isUserLoggedIn("customer")){
    $templateParams["title"] = "Order";
    $templateParams["name"] = "order.php";

    if(isset($_SESSION["final_products"])){
        $templateParams["final_products"] = $_SESSION["final_products"];
    }
    require 'template/base.php';
} else{
    require 'login.php';
}*/

$_SESSION["email"] = "gino.lippa@prints.com";
$_SESSION["role"] = UserType::Customer;

// selezioniamo le carte di credito data l'email
$email = $_SESSION["email"];
$templateParams["customer_credit_cards"] = $dbh->getCustomerCreditCardByEmail($email);

// selezioniamo i corrieri presenti
$templateParams["shippers"] = $dbh->query("SELECT * FROM shipper");
$templateParams["customer"] = $dbh->getUserByEmail($email);


$templateParams["title"] = "Order";
$templateParams["name"] = "order.php";

require 'template/base.php';

?>
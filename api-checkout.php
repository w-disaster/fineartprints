<?php
require_once('bootstrap.php'); 
require_once("utils/functions.php");

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

$templateParams["title"] = "Order";
$templateParams["name"] = "order.php";

require 'template/base.php';

?>
<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$result = "Card not valid";

if(isUserLoggedIn(UserType::Customer)){
    
    $date = new DateTime($_GET["expire_date"]);
   
    if(count($dbh->getCreditCard($_GET["owner"], $date->format("m/y"), $_GET["number"])) > 0){

        if(count($dbh->getPaymentInfo($_SESSION["email"], $_GET["number"])) == 0){

            $dbh->addPaymentInfo($_SESSION["email"], $_GET["number"]);
            $result = $_GET["number"];
        }
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>
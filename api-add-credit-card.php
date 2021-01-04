<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$result = false;

if(isUserLoggedIn(UserType::Customer)){
    
    $date = new DateTime($_GET["expire_date"]);
    $credit_card_date = $date->format("m/y");
   
    if(count($dbh->getCreditCard($_GET["owner"], $credit_card_date, $_GET["number"])) > 0){
        
        if(count($dbh->getPaymentInfo($_SESSION["email"], $_GET["number"])) == 0){

            $dbh->addPaymentInfo($credit_card_date, $_GET["number"]);
            $result = true;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>
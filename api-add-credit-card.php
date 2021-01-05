<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$result = false;

if(isUserLoggedIn(UserType::Customer)){
    
    $date = new DateTime($_GET["expire_date"]);
   
    if(count($dbh->getCreditCard($_GET["owner"], $date->format("m/y"), $_GET["number"])) > 0){

        if (count($dbh->isPaymentInfoRemoved($_SESSION["email"], $cardnumber)) != 0) {
            $dbh->updatePaymentInfo($_SESSION["email"], $cardnumber, "in use");
        } else {
            $dbh->addPaymentInfo( $_SESSION["email"], $cardnumber);
        }
        $result = true;
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>
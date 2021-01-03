<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$result = false;

if(isUserLoggedIn(UserType::Customer)){
    //$info = substr($_GET["expire_date"], 3, 2)."/".substr($_GET["expire_date"], 6, 2);
    $info = "10/50";
   
    if(count($dbh->getCreditCard($_GET["owner"], $info, $_GET["number"])) > 0){
        $dbh->addPaymentInfo($_SESSION["email"], $_GET["number"]);
        $result = true;
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>
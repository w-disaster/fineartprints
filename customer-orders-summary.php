<?php
    require_once './bootstrap.php';
    if(isUserLoggedIn(UserType::Customer)) {

        $templateParams["title"] = "Customer orders";
        $templateParams["name"] = "template/customer-orders-summary-template.php";

        $templateParams["notifications"] = $dbh->getNotifications($_SESSION["email"]);
        $i = 0;
        foreach($templateParams["notifications"] as $nots): $i++; endforeach;
        if(isset($_POST["notif"]) && !is_null($_POST["notif"])) {
            $dbh->clearNotifications($_SESSION["email"]);
            $i = 0;
            $templateParams["notifications"] = $dbh->getNotifications($_SESSION["email"]);
        }
        require './template/base.php';
    } else {
        header('Location: login.php');
    }
?>
<?php
    require_once 'utils/functions.php';
    if(isUserLoggedIn(UserType::Customer)) {
        require_once 'bootstrap.php';

        $templateParams["title"] = "Customer orders";
        $templateParams["name"] = "customer-orders-template.php";

        $templateParams["notifications"] = $dbh->getNotifications();
        $i = 0;
        foreach($templateParams["notifications"] as $nots): $i++; endforeach;
        if(isset($_POST["notif"]) && !is_null($_POST["notif"])) {
            $dbh->clearNotifications();
            $i = 0;
            $templateParams["notifications"] = $dbh->getNotifications();
        }
        require 'template/base.php';
    } else {
        header('Location: login.php');
    }
?>
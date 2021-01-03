<?php
require_once "bootstrap.php";
require_once "utils/functions.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);

    if(empty($login_result)){
        $templateParams["loginError"] = true;
    }
    else{
        $templateParams["loginError"] = false;
        registerLoggedUser($login_result[0]);
    }
}

if (isUserLoggedIn(UserType::Customer)) {
    $templateParams["title"] = "Customer Area - Fine Art Prints";
    $templateParams["name"] = "customer-area-template.php";
} else if (isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Fine Art Prints";
    $templateParams["name"] = "seller-profile-template.php";
} else {
    $templateParams["title"] = "Login - Fine Art Prints";
    $templateParams["name"] = "login-template.php";
}

require "template/base.php";
?>
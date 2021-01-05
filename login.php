<?php
require_once "bootstrap.php";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (!$dbh->checkLogin($email, $password)){
        $templateParams["loginError"] = true;
    }
}

if (isUserLoggedIn(UserType::Customer)) {
    $templateParams["title"] = "Customer Area - Fine Art Prints";
    $templateParams["name"] = "customer-area.php";
    require "customer-area.php";
} else if (isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Fine Art Prints";
    $templateParams["name"] = "seller-profile-template.php";
    require "template/base.php";
} else {
    $templateParams["title"] = "Login - Fine Art Prints";
    $templateParams["name"] = "login-template.php";
    require "template/base.php";
}

?>
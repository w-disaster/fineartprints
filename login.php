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
    $templateParams["title"] = "Customer Area";
    $templateParams["name"] = "customer-area.php";
    header("Location: customer-area.php");
} else if (isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area";
    $templateParams["name"] = "template/seller-profile-template.php";
    require "template/base.php";
} else {
    $templateParams["title"] = "Login";
    $templateParams["name"] = "template/login-template.php";
    require "template/base.php";
}

?>
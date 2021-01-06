<?php
require_once 'bootstrap.php';

if (isUserLoggedIn(UserType::Seller)) {

    $templateParams["title"] = "Seller Area - Profile";
    $templateParams["name"] = "template/seller-profile-template.php";
    $templateParams["sidebar"] = "template/seller-sidebar.php";

    $email = htmlspecialchars($_SESSION["email"]);
    $user = $dbh->getUser($email);

    if (empty($user)) {
        header("Location: error-404.php");
    } else {
        $user = $user[0];
    }

} else {
    header("Location: login.php");
}

require 'template/base.php';
?>
<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Your prints - Fine Art Prints";
    $templateParams["name"] = "seller-prints-template.php";
    $email = htmlspecialchars($_SESSION["email"]);
    $templateParams["prints"] = $dbh->getPicturesFromSeller($email);

    

} else {
    $templateParams["title"] = "Page not found";
    $templateParams["name"] = "template-404.php";
    require "error-404.php";
    header('HTTP/1.0 404 Not Found');
    $_GET['e'] = 404;
}

require 'template/base.php';
?>
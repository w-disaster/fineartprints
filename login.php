<?php
require_once "bootstrap.php";

$password = "Password2021!";
/* Valid fields: we generate the salt for user password */
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
/* We encode the password using the generated salt */
$password = hash('sha512', $password.$random_salt);
var_dump($password, $random_salt);

if(isset($_POST["email"]) && isset($_POST["password"])){
    
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (!$dbh->checkLogin($email, $password)){
        $templateParams["loginError"] = true;
    }
}

if (isUserLoggedIn(UserType::Customer)) {
    header("Location: customer-area.php");

} else if (isUserLoggedIn(UserType::Seller)) {
    header("Location: seller-profile.php");
} else {
    $templateParams["title"] = "Login";
    $templateParams["name"] = "template/login-template.php";
    require "template/base.php";
}

?>
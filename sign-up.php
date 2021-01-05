<?php
require_once 'bootstrap.php';
$templateParams["title"] = "Sign-up";
$templateParams["name"] = "sign-up-template.php";
$isnamevalid = "";
$issurnamevalid = "";
$ispasswordvalid = "";
$isconfpwvalid = "";
$isemailvalid = "";
$isphonevalid = "";

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["password"]) &&
isset($_POST["confirm-password"]) && isset($_POST["email"]) && isset($_POST["phone"]) &&
isset($_POST["birth-date"]) && isset($_POST["city"]) && isset($_POST["address"]) &&
isset($_POST["postal-code"]) && isset($_POST["province"])) {
    $name = htmlspecialchars($_POST["name"]);
    $surname = htmlspecialchars($_POST["surname"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirm_password = htmlspecialchars($_POST["confirm-password"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $birth_date = htmlspecialchars($_POST["birth-date"]);
    $address = htmlspecialchars($_POST["address"]);
    $postal_code = htmlspecialchars($_POST["postal-code"]);
    $province = htmlspecialchars($_POST["province"]);

    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST["password"])) {
        $ispasswordvalid = "is-invalid";

    } else if ($_POST["password"] != $_POST["confirm-password"]) {
        $isconfpwvalid = "is-invalid";

    } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
        $isemailvalid = "is-invalid";

    }else if (count($dbh->getUser($_POST["email"])) == 1) {
        $isemailvalid = "is-invalid";

    } else if (!is_numeric($_POST["phone"]) || strlen($_POST["phone"]) < 9 || strlen($_POST["phone"]) > 10) {
        $isphonevalid = "is-invalid";
        
    } else {

        /* Valid fields: we generate the salt for user password */
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        /* We encode the password using the generated salt */
        $password = hash('sha512', $password.$random_salt);

        /* We add the user */
        $dbh->addUser($email, $birth_date, $password, $random_salt, $name, $surname, 
        $phone, $city, $postal_code, $province, $address,
        $_POST["ship_option"], "customer");
        header('Location: login.php');
    }
}

require 'template/base.php';
?>
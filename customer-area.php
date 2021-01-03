<?php
      require_once 'bootstrap.php';
    if(isUserLoggedIn(UserType::Customer)) {
        $templateParams["title"] = "Customer area";
        $templateParams["name"] = "customer-area-template.php";

        $msgerr = "";
        $msgerrcolor = "text-danger";
        $oldpw = "";
        $templateParams["personal_info"] = $dbh->getUser($_SESSION["username"]);
        foreach ($templateParams["personal_info"] as $info) {
            $oldpw = $info["Password"];  
        }

        if (!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["new-password"]) &&
        !empty($_POST["confirm-password"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) &&
        !empty($_POST["birth-date"]) && !empty($_POST["city"]) && !empty($_POST["address"]) &&
        !empty($_POST["postal-code"]) && !empty($_POST["province"])) {
            if (!preg_match("/^([a-zA-Z' ]+)$/", $_POST["name"])) {
                $msgerr = "Please insert a valid name.";
            } else if (!preg_match("/^([a-zA-Z' ]+)$/", $_POST["surname"])) {
                $msgerr = "Please insert a valid surname.";
            } else if ($_POST["old-password"] != $oldpw) {
                $msgerr = "Old password doensn't match.";
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST["new-password"]) || 
            $_POST["new-password"] == $_POST["old-password"]) {
                $msgerr = "New password must be different from the old one,
                longer than 8 digits, and contains uppercase, lowercase and numbers.";
            } else if ($_POST["new-password"] != $_POST["confirm-password"]) {
                $msgerr = "Confirmation password is different.";
            } else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
                $msgerr = "Please provide a valid email.";
            } else if (!is_numeric($_POST["phone"]) || strlen($_POST["phone"]) < 9 || strlen($_POST["phone"]) > 10) {
                $msgerr = "Please provide a valid phone";
            } else {
                $dbh->updateCustomer($_POST["email"], $_POST["birth-date"], $_POST["new-password"], $_POST["name"], $_POST["surname"], 
                $_POST["phone"], $_POST["city"], $_POST["postal-code"], $_POST["province"], $_POST["address"]);
                $templateParams["personal_info"] = $dbh->getCustomer();
                $msgerrcolor = "text-success";
                $msgerr = "Update succesful!";
            }
        }

            $templateParams["pay_info"] = $dbh->getPaymentInfo();


        if (isset($_POST["remove_number"])) {
            $dbh->deletePaymentInfo($_POST["remove_number"]);
            $templateParams["pay_info"] = $dbh->getPaymentInfo();
        }

        $iscardvalid = "";

        if (isset($_POST["add_number"]) && isset($_POST["expire_date"]) && !empty($_POST["owner"])) {
            $date = new DateTime($_POST["expire_date"]);
            if (count($dbh->getCreditCard($_POST["owner"],$date->format('m/y'), $_POST["add_number"])) != 0) {
                $dbh->addPaymentInfo($_POST["add_number"]);
                $templateParams["pay_info"] = $dbh->getPaymentInfo();
            } else {
                $iscardvalid = "is-invalid";
            }
        }

        require 'template/base.php';

    } else {
        header('Location: login.php');
    }
?>
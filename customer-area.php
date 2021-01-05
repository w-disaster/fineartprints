<?php
    require_once 'bootstrap.php';
    if(isUserLoggedIn(UserType::Customer)) {
        $templateParams["title"] = "Customer area";
        $templateParams["name"] = "customer-area-template.php";

        $msgerr = "";
        $msgerrcolor = "text-danger";
        $oldpw = "";
        $templateParams["personal_info"] = $dbh->getUser($_SESSION["email"]);
        
        /* I take current password and salt to check if match the one inserted by user */
        $oldpw = $templateParams["personal_info"][0]["Password"];
        $salt = $templateParams["personal_info"][0]["Salt"];

        /* Expression matching for post fields */
        if (isset($_POST["namef"]) && isset($_POST["surname"]) && isset($_POST["new-password"]) &&
        isset($_POST["old-password"]) && isset($_POST["confirm-password"]) && isset($_POST["phone"]) && isset($_POST["birth-date"]) &&
        isset($_POST["city"]) && isset($_POST["address"]) && isset($_POST["postal-code"]) &&
        isset($_POST["province"])) {
            /* Name */
            if (!preg_match("/^([a-zA-Z' ]+)$/", $_POST["namef"])) {
                $msgerr = "Please insert a valid name.";

            /* Surname */
            } else if (!preg_match("/^([a-zA-Z' ]+)$/", $_POST["surname"])) {
                $msgerr = "Please insert a valid surname.";

            /* Old password */
            } else if (hash('sha512', $_POST["old-password"].$salt) != $oldpw) {
                $msgerr = "Old password doesn't match.";

            /* New password: Must check */
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST["new-password"]) || 
            $_POST["new-password"] == $_POST["old-password"]) {
                $msgerr = "New password must be different from the old one
                and have minimum eight characters, at least one uppercase letter,
                 one lowercase letter, one number and one special character.";
                echo "ciao";

            } else if ($_POST["new-password"] != $_POST["confirm-password"]) {
                $msgerr = "Confirmation password is different.";
            
            /* Phone */
            } else if (!is_numeric($_POST["phone"]) || strlen($_POST["phone"]) < 9 || strlen($_POST["phone"]) > 10) {
                $msgerr = "Please provide a valid phone";

            /* The fields meet the requirements: we update the customer*/
            } else {

                /* Valid fields: we generate the salt for user password */
                $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
                /* We encode the password using the generated salt */
                $new_password = htmlspecialchars($_POST["new-password"]);
                $new_password = hash('sha512', $new_password.$random_salt);

                /* We update the customer */
                $dbh->updateCustomer($_SESSION["email"], $_POST["birth-date"], $new_password, $random_salt, $_POST["namef"], $_POST["surname"], 
                $_POST["phone"], $_POST["city"], $_POST["postal-code"], $_POST["province"], $_POST["address"]);
                $templateParams["personal_info"] = $dbh->getUser($_SESSION["email"]);
                $msgerrcolor = "text-success";
                $msgerr = "Update succesful!";
            }
        }

        $templateParams["pay_info"] = $dbh->getCustomerCreditCards($_SESSION["email"]);

        if (isset($_POST["remove_number"])) {
            $dbh->updatePaymentInfo($_SESSION["email"], $_POST["remove_number"], "removed");
            $templateParams["pay_info"] = $dbh->getCustomerCreditCards($_SESSION["email"]);
        }

        $iscardvalid = "";

        //add new payment info
        if (isset($_POST["add_number"]) && isset($_POST["expire_date"]) && isset($_POST["owner"])) {
            $date = new DateTime($_POST["expire_date"]);
            if (count($dbh->getCreditCard($_POST["owner"],$date->format('m/y'), $_POST["add_number"])) != 0) {
                if (count($dbh->isPaymentInfoInUse($_SESSION["email"], $_POST["add_number"])) == 0) {
                    $dbh->updatePaymentInfo($_SESSION["email"], $_POST["add_number"], "in use");
                } else {
                    $dbh->addPaymentInfo( $_SESSION["email"], $_POST["add_number"]);
                }
                $templateParams["pay_info"] = $dbh->getCustomerCreditCards($_SESSION["email"]);
            } else {
                $iscardvalid = "is-invalid";
            }
        }

        require 'template/base.php';

    } else {
        header('Location: login.php');
    }
?>
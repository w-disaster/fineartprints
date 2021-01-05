<?php
    require_once 'bootstrap.php';
    if(isUserLoggedIn(UserType::Customer)) {
        $templateParams["title"] = "Profile";
        $templateParams["name"] = "template/customer-area-template.php";

        $msgform = "";
        $msgformcolor = "text-danger";
        $oldpw = "";
        $templateParams["personal_info"][0] = $dbh->getUser($_SESSION["email"])[0];
        
        /* I take current password and salt to check if match the one inserted by user */
        $oldpw = $templateParams["personal_info"][0]["Password"];
        $salt = $templateParams["personal_info"][0]["Salt"];

        /* Expression matching for post fields */
        if (isset($_POST["namef"]) && isset($_POST["surname"]) && isset($_POST["new-password"]) &&
        isset($_POST["old-password"]) && isset($_POST["confirm-password"]) && isset($_POST["phone"]) && isset($_POST["birth-date"]) &&
        isset($_POST["city"]) && isset($_POST["address"]) && isset($_POST["postal-code"]) &&
        isset($_POST["province"])) {
            $name = htmlspecialchars($_POST["namef"]);
            $surname = htmlspecialchars($_POST["surname"]);
            $password = htmlspecialchars($_POST["new-password"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $city = htmlspecialchars($_POST["city"]);
            $birth_date = htmlspecialchars($_POST["birth-date"]);
            $address = htmlspecialchars($_POST["address"]);
            $postal_code = htmlspecialchars($_POST["postal-code"]);
            $province = htmlspecialchars($_POST["province"]);
            /* Old password */
             if (hash('sha512', $_POST["old-password"].$salt) != $oldpw) {
                $msgform = "Old password doesn't match.";

            /* New password: Must check */
            } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST["new-password"]) || 
            $_POST["new-password"] == $_POST["old-password"]) {
                $msgform = "New password must be different from the old one
                and have minimum eight characters, at least one uppercase letter,
                 one lowercase letter, one number and one special character.";
                echo "ciao";

            } else if ($_POST["new-password"] != $_POST["confirm-password"]) {
                $msgform = "Confirmation password is different.";
            
            /* Phone */
            } else if (!is_numeric($_POST["phone"]) || strlen($_POST["phone"]) < 9 || strlen($_POST["phone"]) > 10) {
                $msgform = "Please provide a valid phone";

            /* The fields meet the requirements: we update the customer*/
            } else {

                /* Valid fields: we generate the salt for user password */
                $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
                /* We encode the password using the generated salt */
                $password = hash('sha512', $password.$random_salt);

                /* We update the customer */
                $dbh->updateCustomer($_SESSION["email"], $birth_date, $password, $random_salt, $name, $surname, 
                $phone, $city, $postal_code, $province, $address);
                $templateParams["personal_info"] = $dbh->getUser($_SESSION["email"]);
                $msgformcolor = "text-success";
                $msgform = "Update succesful!";
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
            $owner = htmlspecialchars($_POST["owner"]);
            $date = new DateTime($_POST["expire_date"]);
            $dateconverted = htmlspecialchars($date->format('m/y'));
            $cardnumber = htmlspecialchars($_POST["add_number"]);
            if (count($dbh->getCreditCard($owner,$dateconverted, $cardnumber)) != 0) {
                if (count($dbh->isPaymentInfoRemoved($_SESSION["email"], $cardnumber)) != 0) {
                    $dbh->updatePaymentInfo($_SESSION["email"], $cardnumber, "in use");
                } else {
                    $dbh->addPaymentInfo( $_SESSION["email"], $cardnumber);
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
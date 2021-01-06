<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

if(isUserLoggedIn("customer")){
    if(count($_SESSION["final_products"]) > 0){
        $finalProducts = $_SESSION["final_products"];

        switch($_POST["paymentRadio"]){
            case "defaultCardRadio":
                $cardNumber = htmlspecialchars($_POST["defaultCardNumber"]);
                break;
            case "altCardRadio":
                if(isset($_POST["altCardNumber"])){
                    $cardNumber = htmlspecialchars($_POST["altCardNumber"]);
                }else {
                    header("Location: checkout.php");
                }
                break;
        }

        $shipperName = htmlspecialchars($_POST["shipperCarrier"]);

        switch($_POST["shippingRadio"]){
            case "defaultShipping":
                $city = NULL;
                $address = NULL;
                $postalCode = NULL;
                break;

            case "altShipping":
                $city = htmlspecialchars($_POST["altCity"]);
                $postalCode = intVal(htmlspecialchars($_POST["altPostalCode"]), 10);
                $address = htmlspecialchars($_POST["altAddress"]);
                break;
        }

        $email = htmlspecialchars($_SESSION["email"]);

        /* We add the order */
        $order_id = $dbh->addOrder($city, $postalCode, $address, date("Y-m-d"), $email, $cardNumber, $shipperName);
        
        $finalProducts = $_SESSION["final_products"];
        foreach($finalProducts as $product){
            if(isset($product["print_id"])){
                $dbh->addFinalProduct($product["title"], $product["technique_id"], $product["frame_id"], $product["passpartout_id"], 
                    $product["width"], $product["height"],  $order_id, $product["price"]);
            }
        }

        $_SESSION["final_products"] = [];
        $_SESSION["products_count"] = 0;
        
        require 'index.php';
    }else{
        require 'index.php';
    }

} else{
    require 'login.php';
}


?>
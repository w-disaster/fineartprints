<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';


if(isUserLoggedIn("customer")){

    if(isset($_SESSION["final_products"])){
        $finalProducts = $_SESSION["final_products"];
        $templateParams["final_products"] = array();
        var_dump($finalProducts);
        for($i = 0; $i < count($finalProducts); $i++){
            $templateParams["final_products"][$i]["print_id"] = $finalProducts[$i]["print_id"];

            $templateParams["final_products"][$i]["title"] = $finalProducts[$i]["title"];
            $templateParams["final_products"][$i]["height"] = $finalProducts[$i]["height"];
            $templateParams["final_products"][$i]["width"] = $finalProducts[$i]["width"];

            //SESSION technique
            $technique_id = $finalProducts[$i]["technique_id"];
            $templateParams["final_products"][$i]["technique"] = $technique_id == 0 ? "none" :
                $dbh->getTechniqueFromId(intVal($technique_id, 10))[0]["Description"];
            //SESSION frame
            $frame_id = $finalProducts[$i]["frame_id"];
            $templateParams["final_products"][$i]["frame"] = $frame_id == 0 ? "none" : 
                $dbh->getFrameFromId(intVal($frame_id, 10))[0]["Description"];
            //SESSION passpartout
            $passpartout_id = $finalProducts[$i]["passpartout_id"];
            $templateParams["final_products"][$i]["passpartout"] = $passpartout_id == 0 ? "none" : 
                $dbh->getPasspartoutFromId(intVal($passpartout_id, 10))[0]["Specifications"];

            $templateParams["final_products"][$i]["price"] = $finalProducts[$i]["price"];
        }
    }

    // selezioniamo le carte di credito data l'email
    $email = $_SESSION["email"];
    $templateParams["customer_credit_cards"] = $dbh->getCustomerCreditCardByEmail($email);

    // selezioniamo i corrieri presenti
    $templateParams["shippers"] = $dbh->query("SELECT * FROM shipper");
    $templateParams["customer"] = $dbh->getUser($email);


    $templateParams["title"] = "Checkout";
    $templateParams["name"] = "checkout-template.php";


    require 'template/base.php';
} else{
    require 'login.php';
}

?>
<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';


if(isUserLoggedIn("customer")){

    if(isset($_SESSION["final_products"])){
        $final_products = $_SESSION["final_products"];
        $templateParams["final_products"] = array();

        for($i = 0; $i < count($final_products); $i++){
            $templateParams["final_products"][$i]["print_id"] = $final_products[$i]["print_id"];

            $templateParams["final_products"][$i]["title"] = $final_products[$i]["title"];
            $templateParams["final_products"][$i]["height"] = $final_products[$i]["height"];
            $templateParams["final_products"][$i]["width"] = $final_products[$i]["width"];

            //SESSION technique
            $technique_id = $final_products[$i]["technique_id"];
            $templateParams["final_products"][$i]["technique"] = $technique_id == 0 ? "none" :
                $dbh->getTechniqueFromId(intVal($technique_id, 10))[0];
            //SESSION frame
            $frame_id = $final_products[$i]["frame_id"];
            $templateParams["final_products"][$i]["frame"] = $frame_id == 0 ? "none" : 
                $dbh->getFrameFromId(intVal($frame_id, 10))[0];
            //SESSION passpartout
            $passpartout_id = $final_products[$i]["passpartout_id"];
            $templateParams["final_products"][$i]["passpartout"] = $passpartout_id == 0 ? "none" : 
                $dbh->getPasspartoutFromId(intVal($passpartout_id, 10))[0];

            $templateParams["final_products"][$i]["price"] = $final_products[$i]["price"];
        }
    }

    // selezioniamo le carte di credito data l'email
    $email = $_SESSION["email"];
    $templateParams["customer_credit_cards"] = $dbh->getCustomerCreditCardByEmail($email);

    // selezioniamo i corrieri presenti
    $templateParams["shippers"] = $dbh->query("SELECT * FROM shipper");
    $templateParams["customer"] = $dbh->getUser($email);


    $templateParams["title"] = "Order";
    $templateParams["name"] = "order.php";


    require 'template/base.php';
} else{
    require 'login.php';
}

?>
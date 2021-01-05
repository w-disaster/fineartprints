<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Your prints";
    $templateParams["name"] = "seller-prints-template.php";
    $email = htmlspecialchars($_SESSION["email"]);

    $templateParams["prints"] = $dbh->getPicturesFromSeller($email);

    if(isset($_GET["print_id"])) {
        $templateParams["print_selected"] = true;
        $print_id = htmlspecialchars($_GET["print_id"]);
        $print = $dbh->getPictureFromTitle($print_id)[0];
        $templateParams["categories"] = $dbh->getCategories();
        $templateParams["techniques"] = $dbh->getTechniques();
       // var_dump_plus(($templateParams["techniques"]));
        $print_techniques = $dbh->getTechniquesFromPictureTitle($print_id);
        //var_dump_plus(($print_techniques));

    } else {
        $templateParams["print_selected"] =  false;
    }

} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
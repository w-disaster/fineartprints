<?php
require_once 'bootstrap.php';

/**
 * Pression on link or on remove button triggers session elimination for item selected.
 */

$templateParams["title"] = "Shopping cart";
$templateParams["name"] = "shopping-cart-template.php";

$final_products = $_SESSION["final_products"] ?? [];

foreach ($final_products as &$final_product) {
    $title = $final_product["title"];
    $print = $dbh->getPictureFromTitle($title)[0];

    $technique_id = intval($final_product["technique_id"], 10);
    $frame_id = intval($final_product["frame_id"], 10);
    $passpartout_id = intval($final_product["passpartout_id"], 10);

    if ($technique_id == 0) {
        $final_product["technique"] = "none";
    } else {
        $final_product["technique"] =  $dbh->getTechniqueFromId($technique_id)[0]["Description"];
    }

    if ($frame_id == 0) {
        $final_product["frame"] = "none";
    } else {
        $final_product["frame"] = $dbh->getFrameFromId($frame_id)[0]["Description"];
    }

    if ($passpartout_id == 0) {
        $final_product["passpartout"] = "none";
    } else {
        $final_product["passpartout"] = $dbh->getPasspartoutFromId($passpartout_id)[0]["Specifications"];
    }

    $final_product["image"] = $print["Image"];
}

unset($final_product);

if (isUserLoggedIn(UserType::Customer)) {
    $templateParams["logged"] = true;
} else {
    $templateParams["logged"] = false;
}

$templateParams["final_products"] = $final_products;

require 'template/base.php';
?>
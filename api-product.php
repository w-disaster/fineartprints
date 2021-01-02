<?php

/**
 * Pression on link or on remove button triggers session elimination for item selected.
 */

require_once 'bootstrap.php';
require_once 'utils/functions.php';

$error = false;

if (isset($_GET["title"])) {
    
    $print = $dbh->getPictureFromTitle($_GET["title"]);

    if (!empty($print)) {

        $title = $_GET["title"];
        $templateParams["title"] = $title;
        $templateParams["name"] = "product-page-template.php";

        $print = $print[0];
        $techniques = $dbh->getTechniquesFromPictureTitle($title);
        $frames = $dbh->getFramesFromSeller($print["Email"]);
        $passpartouts = $dbh->getPasspartoutsFromSeller($print["Email"]);

        $templateParams["height"] = $_GET["height"] ?? $default_height;
        $templateParams["width"] = $_GET["width"] ?? $default_width;

        $price_calculator->setBasePrice(floatval($print["Base_price"]));
        $price_calculator->setHeight(floatval($templateParams["height"]));
        $price_calculator->setWidth(floatval($templateParams["width"]));

        if (isset($_GET["technique_id"]) && !empty($techniques[$_GET["technique_id"]])) {
            $templateParams["technique_id"] = $_GET["technique_id"];
            $chosenTechnique = $techniques[$templateParams["technique_id"]];
            $price_calculator->setTechniquePrice($chosenTechnique["Price"]);
        } else {
            $price_calculator->setTechniquePrice(0.0);
        }

        if (isset($_GET["frame_id"]) && !empty($techniques[$_GET["frame_id"]])) {
            $templateParams["frame_id"] = $_GET["frame_id"];
            $chosenFrame = $frames[$templateParams["frame_id"]];
            $price_calculator->setFramePrice($chosenFrame["Price"]);
        } else {
            $price_calculator->setFramePrice(0.0);
        }

        if (isset($_GET["passpartout_id"]) && !empty($techniques[$_GET["passpartout_id"]])) {
            $templateParams["passpartout_id"] = $_GET["passpartout_id"];
            $chosenPasspartout = $passpartouts[$templateParams["passpartout_id"]];
            $price_calculator->setPasspartoutPrice($chosenPasspartout["Price"]);
        } else {
            $price_calculator->setPasspartoutPrice(0.0);
        }

        if ($print["Discount"] > 0) {
            $price_calculator->setDiscountedPrice(discounted_price($print["Base_price"], $print["Discount"]));
            $templateParams["price_discounted"] = $price_calculator->computeDiscountedPrice();
        }
        $templateParams["price"] = $price_calculator->computePrice();

        if (isUserLoggedIn(UserType::Customer)) {
            $templateParams["logged"] = true;
        } else {
            $templateParams["logged"] = false;
        }

    } else {
        $error = true;
    }
} else {
    $error = true;
}

if ($error) {
    $templateParams["title"] = "Page not found";
    $templateParams["name"] = "template-404.php";
}

require 'template/base.php';
?>

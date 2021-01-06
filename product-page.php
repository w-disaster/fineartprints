<?php

require_once 'bootstrap.php';
require_once 'utils/functions.php';

$error = false;

if (isset($_GET["title"])) {
    
    $title = str_replace("%20", " ", $_GET["title"]);
    $print = $dbh->getPictureFromTitle($title);

    if (!empty($print)) {

        
        $templateParams["title"] = $title;
        $templateParams["name"] = "product-page-template.php";

        $print = $print[0];
        $techniques = $dbh->getTechniquesFromPictureTitle($title);
        $frames = $dbh->getFramesFromSeller($print["Email"]);
        $passpartouts = $dbh->getPasspartoutsFromSeller($print["Email"]);

        $templateParams["height"] = $_GET["height"] ?? default_height;
        $templateParams["width"] = $_GET["width"] ?? default_width;

        $templateParams["height"] = validate_measure($templateParams["height"], default_height, max_height);
        $templateParams["width"] = validate_width($templateParams["width"], default_width, max_width);

        $price_calculator->setBasePrice(floatval($print["Base_price"]));
        $price_calculator->setHeight(floatval($templateParams["height"]));
        $price_calculator->setWidth(floatval($templateParams["width"]));

        $price_calculator->setTechniquePrice(0.0);    
        if (isset($_GET["technique_id"])) {
            $chosenTechnique = $dbh->getTechniqueFromId($_GET["technique_id"]);
            if (!empty($chosenTechnique)) {
                $chosenTechnique = $chosenTechnique[0];
                $templateParams["technique_id"] = $chosenTechnique["Technique_id"];
                $price_calculator->setTechniquePrice($chosenTechnique["Price_per_cm2"]);
            }
        }

        $price_calculator->setFramePrice(0.0);
        if (isset($_GET["frame_id"])) {
            $chosenFrame = $dbh->getFrameFromId($_GET["frame_id"]);
            if (!empty($chosenFrame)) {
                $chosenFrame = $chosenFrame[0];
                $templateParams["frame_id"] = $chosenFrame["Frame_id"];
                $price_calculator->setFramePrice($chosenFrame["Price"]);
            }
        }
        
        $price_calculator->setPasspartoutPrice(0.0);
        if (isset($_GET["passpartout_id"])) {
            $chosenPasspartout = $dbh->getPasspartoutFromId($_GET["passpartout_id"]);
            if (!empty($chosenPasspartout)) {
                $chosenPasspartout = $chosenPasspartout[0];
                $templateParams["passpartout_id"] = $chosenPasspartout["Passpartout_id"];
                $price_calculator->setPasspartoutPrice($chosenPasspartout["Price_per_cm2"]);
            }
        }

        if ($print["Discount"] > 0) {
            $price_calculator->setDiscountedPrice(discounted_price($print["Base_price"], $print["Discount"]));
            $templateParams["price_discounted"] = $price_calculator->computeDiscountedPrice();
        }
        $templateParams["price"] = $price_calculator->computePrice();

    } else {
        $error = true;
    }
} else {
    $error = true;
}

// thanks to https://stackoverflow.com/questions/11137625/php-display-a-404-error-without-redirecting-to-another-page
if ($error) {
    $templateParams["title"] = "Page not found";
    $templateParams["name"] = "template-404.php";
    header('Location: error-404.php');
    $_GET['e'] = 404;
}

require 'template/base.php';
?>

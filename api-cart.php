<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$isInsertionValid = true;

if (isset($_POST["title"]) && isset($_POST["action"])) {

    if ($_POST["action"] == CartAction::Add_item) {

        $print = $dbh->getPictureFromTitle(str_replace("%20", " ", $_POST["title"]))[0];
        $price_calculator->setBasePrice($print["Base_price"]);

        $title = $print["Title"];
        $height = validate_height(floatval($_POST["height"]));
        $price_calculator->setHeight($height);

        $width = validate_width(floatval($_POST["width"]));
        $price_calculator->setWidth($width);

        $price_calculator->setTechniquePrice(0.0);
        $technique_id = "none";
        if (isset($_POST["technique_id"])) {
            $technique = $dbh->getTechniqueFromId($_POST["technique_id"])[0];
            if (!empty($technique)) {
                $templateParams["technique_id"] = $technique["Technique_id"];
                $price_calculator->setTechniquePrice($technique["Price_per_cm2"]);
                $technique_id = $technique["Technique_id"];
            } else {
                $isInsertionValid = false;
            }
        } else {
            $isInsertionValid = false;
        }

        $price_calculator->setFramePrice(0.0);
        $frame_id = "none";
        if (isset($_POST["frame_id"])) {
            $frame = $dbh->getFrameFromId($_POST["frame_id"])[0];
            if (!empty($frame)) {
                $templateParams["frame_id"] = $frame["Frame_id"];
                $price_calculator->setFramePrice($frame["Price"]);
                $frame_id = $frame["Frame_id"];
            }
        }
        
        $price_calculator->setPasspartoutPrice(0.0);
        $passpartout_id = "none";
        if (isset($_POST["passpartout_id"])) {
            $chosenPasspartout = $dbh->getPasspartoutFromId($_POST["passpartout_id"])[0];
            if (!empty($chosenPasspartout)) {
                $templateParams["passpartout_id"] = $chosenPasspartout["Passpartout_id"];
                $price_calculator->setPasspartoutPrice($chosenPasspartout["Price_per_cm2"]);
                $passpartout_id = $passpartout["Passpartout_id"];
            }
        }

        if ($print["Discount"] > 0) {
            $price_calculator->setDiscountedPrice(discounted_price($print["Base_price"], $print["Discount"]));
            $price = $price_calculator->computeDiscountedPrice();
        } else {
            $price = $price_calculator->computePrice();
        }

        $print_id = compute_print_id($title, $height, $width, $technique_id, $frame_id, $passpartout_id);

        if ($isInsertionValid) {
            $_SESSION["products_count"] = $_SESSION["products_count"] ?? 0;
            $_SESSION["final_products"][$_SESSION["products_count"]] = array(
                "print_id" => $print_id,
                "title" => $title,
                "height" => $height,
                "width" => $width,
                "technique_id" => $technique_id,
                "frame_id" => $frame_id,
                "passpartout_id" => $passpartout_id,
                "price" => $price
            );
        
            $_SESSION["products_count"]++;
        }

    } else if($_POST["action"] == CartAction::Remove_item) {

        $final_products = $_SESSION["final_products"] ?? [];
        foreach ($final_products as &$final_product) {
            $index = array_search($_POST["title"], $final_product);
        }
        unset($final_product);
        unset($final_product[$index]);
        $_SESSION["products_count"]--;
    }
}

?>
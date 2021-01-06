<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

if (isset($_POST["action"])) {

    if ($_POST["action"] == CartAction::Add_item) {

        $print = $dbh->getPictureFromTitle(str_replace("%20", " ", $_POST["title"]))[0];
        $price_calculator->setBasePrice($print["Base_price"]);

        $title = $print["Title"];
        $height = validate_measure(floatval($_POST["height"]), default_height, max_height);
        $price_calculator->setHeight($height);

        $width = validate_measure(floatval($_POST["width"]), default_width, max_width);
        $price_calculator->setWidth($width);

        $price_calculator->setTechniquePrice(0.0);
        $technique_id = "none";
        if (isset($_POST["technique_id"])) {
            $technique = $dbh->getTechniqueFromId($_POST["technique_id"]);
            if (!empty($technique)) {
                $technique = $technique[0];
                $templateParams["technique_id"] = $technique["Technique_id"];
                $price_calculator->setTechniquePrice($technique["Price_per_cm2"]);
                $technique_id = $technique["Technique_id"];
            }
        } else {
            throw new Exception('Invalid Input', 200);
        }

        $price_calculator->setFramePrice(0.0);
        $frame_id = "none";
        if (isset($_POST["frame_id"])) {
            $frame = $dbh->getFrameFromId($_POST["frame_id"]);
            if (!empty($frame)) {
                $frame = $frame[0];
                $templateParams["frame_id"] = $frame["Frame_id"];
                $price_calculator->setFramePrice($frame["Price"]);
                $frame_id = $frame["Frame_id"];
            }
        }
        
        $price_calculator->setPasspartoutPrice(0.0);
        $passpartout_id = "none";
        if (isset($_POST["passpartout_id"])) {
            $chosenPasspartout = $dbh->getPasspartoutFromId($_POST["passpartout_id"]);
            if (!empty($chosenPasspartout)) {
                $passpartout = $chosenPasspartout[0];
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
        
        $_SESSION["products_count"] = $_SESSION["products_count"] ?? 0;
        $print_id = $_SESSION["products_count"];

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

    } else if($_POST["action"] == CartAction::Remove_item) {

        for($i = 0; $i < $_SESSION["products_count"]; $i++) {
            if(!empty($_SESSION["final_products"][strval($i)]) && $_SESSION["final_products"][strval($i)]["print_id"] == $_POST["print_id"]) {
                $index = strval($i);
            }
        }
        if(isset($index)) {
            unset($_SESSION["final_products"][$index]);
        }
        if($_SESSION["products_count"] > 0) {
            $_SESSION["products_count"]--;
        }
    }
}

?>
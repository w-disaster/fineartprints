<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

if (isset($_POST["title"])) {
    $products_number = $_SESSION["products-number"] ?? 0;
    $products_number++;
    $_SESSION["final-products"][$products_number] = array(
        "title" => $_POST["title"],
        "width" => $_POST["width"],
        "height" => $_POST["height"],
        "technique_id" => $_POST["technique_id"],
        "frame_id" => $_POST["frame_id"],
        "passpartout_id" => $_POST["passpartout_id"]
    );
}

?>
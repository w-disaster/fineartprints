<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

if (isset($_POST["title"])) {

    $_SESSION["products_count"] = $_SESSION["products_count"] ?? 0;
    $_SESSION["final_products"][$_SESSION["products_count"]] = array(
        "title" => str_replace("%20", " ", $_POST["title"]),
        "width" => $_POST["width"],
        "height" => $_POST["height"],
        "technique_id" => $_POST["technique_id"],
        "frame_id" => $_POST["frame_id"],
        "passpartout_id" => $_POST["passpartout_id"],
        "price" => $_POST["price"]
    );
    
    $_SESSION["products_count"]++;
}

?>
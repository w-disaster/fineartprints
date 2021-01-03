<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

if (isset($_POST["title"])) {
    $_SESSION["products-count"] = $_SESSION["products-count"] ?? 0;
    $_SESSION["products-count"]++;
    $_SESSION["final-products"][$_SESSION["products-count"]] = array(
        "title" => $_POST["title"],
        "width" => $_POST["width"],
        "height" => $_POST["height"],
        "technique_id" => $_POST["technique_id"],
        "frame_id" => $_POST["frame_id"],
        "passpartout_id" => $_POST["passpartout_id"]
    );

}

?>
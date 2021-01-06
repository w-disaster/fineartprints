<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$request_id = $_GET["request_id"] ?? 0;

if ($request_id == 1) {
    $title = $_GET["title"];
    $title = str_replace("%20", " ", $title);

    $value = $dbh->getValueFromTitle($title)[0];
    $base_price = $value["Base_price"];
    $discounted_price = $value["Discount"];

    $data = array(
        "price" => $base_price,
        "discounted-price" => $discounted_price,
        "price-divider" => price_divider,
        "default-height" => default_height,
        "default-width" => default_width,
        "max-height" => max_height,
        "max-width" => max_width
    );

} else if ($request_id == 2) {
    $technique_id = $_GET["technique_id"];
    $data = $dbh->getTechniqueFromId($technique_id);
} else if ($request_id == 3) {
    $frame_id = $_GET["frame_id"];
    $data = $dbh->getFrameFromId($frame_id);
} else if ($request_id == 4) {
    $passpartout_id = $_GET["passpartout_id"];
    $data = $dbh->getPasspartoutFromId($passpartout_id);    
} else {
    unset($data);
}

if (!is_null($data)) {
    send_json_data($data);
}

?>
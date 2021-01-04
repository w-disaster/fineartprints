<?php
require_once 'bootstrap.php';

/**
 * Pression on link or on remove button triggers session elimination for item selected.
 */

$templateParams["title"] = "Shopping cart";
$templateParams["name"] = "shopping-cart-template.php";

$final_products = $_SESSION["final_products"] ?? [];

foreach ($final_products as &$final_product) {
    var_dump_plus($final_product);
    $title = $final_product["title"];
    $print = $dbh->getPictureFromTitle($title)[0];
    var_dump_plus((intval($final_product["technique_id"], 10)));
    $technique = $dbh->getTechniqueFromId(intval($final_product["technique_id"], 10));
    $frame = $dbh->getFrameFromId($final_product["frame_id"]);
    $passpartout = $dbh->getPasspartoutFromId($final_product["passpartout_id"]);
    var_dump_plus($technique);
    $final_product["technique"] = $technique;
    $final_product["frame"] = $frame;
    $final_product["passpartout"] = $passpartout;
    $final_product["image"] = $print["Image"];
}

unset($final_product);

$templateParams["final_products"] = $final_products;
var_dump_plus($templateParams["final_products"]);

require 'template/base.php';
?>
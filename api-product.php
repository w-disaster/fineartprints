<?php
require_once 'bootstrap.php';
require_once 'utils/functions.php';

$templateParams["name"] = "product-page-template.php";

$title = $_GET['title'] ?? "Product page";
$templateParams["title"] = $title;
$print = $dbh->getPictureFromTitle($title)[0];
//$techniques = $dbh->getTechniquesFromPictureTitle($title);
$frames = $dbh->getFramesFromSeller($print["Email"]);
$passpartouts = $dbh->getPasspartoutsFromSeller($print["Email"]);

var_dump_plus($passpartouts);

require 'template/base.php';
?>

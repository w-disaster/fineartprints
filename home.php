<?php
require_once 'bootstrap.php';

$templateParams["title"] = "Home";
$templateParams["name"] = "home-template.php";

$templateParams["latestpictures"] = $dbh->getLatestPictures();

$templateParams["salespictures"] = $dbh->getRandSalesPictures(4);

require 'template/base.php';
?>
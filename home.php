<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Home";
$templateParams["nome"] = "home-template.php";

$templateParams["latestpictures"] = $dbh->getLatestPictures();

$templateParams["salespictures"] = $dbh->getRandSalesPictures(4);

require 'template/base.php';
?>
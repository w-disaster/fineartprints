<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Shop";
$templateParams["nome"] = "shop.php";

$templateParams["pictures"] = $dbh->getAllPictures();


require 'template/base.php';
?>
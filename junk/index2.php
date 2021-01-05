<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Shop";
$templateParams["nome"] = "seller-prints.php";

$templateParams["pictures"] = $dbh->getAllPictures();

require 'template/base.php';
?>
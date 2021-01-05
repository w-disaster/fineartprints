<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Seller Area - Fine Art Prints";
$templateParams["nome"] = "seller-prints.php";

$templateParams["pictures"] = $dbh->getAllPictures();

require 'template/base.php';
?>
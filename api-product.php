<?php
require_once 'bootstrap.php';

$title = $_GET['title'];

$templateParams["title"] = $title;
$templateParams["nome"] = "product-page-template.php";

$print = $dbh->getPictureFromTitle($title);

//$templateParams[""]

require 'template/base.php';
?>
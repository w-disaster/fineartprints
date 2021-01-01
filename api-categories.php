<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["title"] = "Categories";
$templateParams["name"] = "categories.php";

$query = "SELECT * From Category";
$templateParams["categories"] = $dbh->query($query);

require 'template/base.php';
?>
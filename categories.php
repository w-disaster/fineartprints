<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["title"] = "Categories";
$templateParams["name"] = "categories-template.php";

$query = "SELECT * From category";
$templateParams["categories"] = $dbh->query($query);

require 'template/base.php';
?>
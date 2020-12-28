<?php
require_once 'bootstrap.php';

$title = str_replace("%", " ", $_GET['title']);

$print = $dbh->getPictureFromTitle($title)[0];

header('Content-Type: application/json');
echo json_encode($print);
?>
<?php
require_once 'bootstrap.php';

$print = $dbh->getPictureFromTitle($_GET['title'])[0];

header('Content-Type: application/json');
echo json_encode($print);
?>
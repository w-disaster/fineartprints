<?php
require_once 'bootstrap.php';

$authors = $_GET['authors'];

for($i = 1; $i <= count($authors); $i++){
    $prints[$i] = $dbh->getPicturesFromAuthor($authors[$i]);
}


var_dump($prints);

header('Content-Type: application/json');
echo json_encode($prints);
?>
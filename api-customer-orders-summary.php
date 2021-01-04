<?php
require_once 'bootstrap.php';
$orders = $dbh->getMyOrders($_SESSION["Email"]);
$products = $dbh->getOrderProducts($_SESSION["Email"]);
for($i = 0; $i < count($products); $i++) {
    $products[$i]["Image"] = UPLOAD_DIR.$products[$i]["Image"];
}

$data = [$orders, $products];
header("Content-Type: application/json");
echo json_encode($data);

?>
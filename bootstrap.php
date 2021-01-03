<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once("utils/functions.php");
require_once("db/database.php");
require_once("utils/price-calculator.php");

$dbh = new DatabaseHelper("localhost", "root", "", "fineartprints", 3306);

const price_divider = 0.001;
$price_calculator = new PriceCalculator(price_divider);

const default_height = 10.00;
const default_width = 10.00;
?>
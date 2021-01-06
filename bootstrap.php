<?php

define("UPLOAD_DIR", "./upload/");

require_once("utils/functions.php");
require_once("db/database.php");
require_once("utils/price-calculator.php");
require_once("utils/secure-login.php");

/* We start the session */
sec_session_start();

$dbh = new DatabaseHelper("localhost", "root", "", "fineartprints", 3306);

const price_divider = 0.001;

const default_height = 30.00;
const default_width = 30.00;
const max_width = 500.00;
const max_height = 500.00;
const max_price = 900.00;

$price_calculator = new PriceCalculator(price_divider);

?>
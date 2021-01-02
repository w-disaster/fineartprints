<?php
session_start();
define("UPLOAD_DIR", "./upload/");
//require_once("utils/functions.php");
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "fineartprints", 3306);
$additive_constant = 0.01;
$subtractive_constant = 1.2;
?>
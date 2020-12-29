<?php
require_once 'bootstrap.php';

$pics = $dbh->getSlideShowPictures();

for($i = 0; $i < count($pics); $i++) {
    $pics[$i]["Image"] = UPLOAD_DIR.$pics[$i]["Image"];
}

header("Content-Type: application/json");
echo json_encode($pics);

?>
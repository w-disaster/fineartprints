<?php

abstract class UserType {
    const Seller = "seller";
    const Customer = "customer";
}

abstract class CartAction {
    const Add_item = 1;
    const Remove_item = 0;
}

abstract class Orientation {
    const Landscape = "landscape";
    const Portrait = "portrait";
}

function isUserLoggedIn($role){
    return !empty($_SESSION["role"]) && $_SESSION["role"] == $role;
}

function registerLoggedUser($user){
    $_SESSION["email"] = $user["Email"];
    $_SESSION["role"] = $user["Role"];
}

function validate_measure($measure, $min, $max) {
    if ($measure > $max) {
        return $max;
    } else if($measure < $min) {
        return $min;
    } else {
        return $measure;
    }
}

function isInRange($number, $min, $max) {
    return !($number < $min || $number > $max);
}

function validate_width($width) {
    if ($width > max_width) {
        return max_width;
    } else if($width < default_width) {
        return default_width;
    } else {
        return $width;
    }
}

function getOrientation($image_name) {
    $image_properties = getimagesize($image_name);
    if($image_properties[0] >= $image_properties[1]) {
        return Orientation::Landscape;
    } else {
        return Orientation::Portrait;
    }
}

/**
 * Adds a new unique title if the one given already exists.
 */
function getValidTitle($title, $dbh) {
    $titles = $dbh->query("SELECT Title From picture");
    $titles_in_use = [];
    foreach($titles as &$elem) {
        array_push($titles_in_use, $elem["Title"]);
    }
    unset($elem);

    if (in_array($title, $titles_in_use)) {
        $i = 1;
        do{
            $i++;
        }
        while(in_array($title, $titles));
        return $title." n.".$i;
    } else {
        return $title;
    }
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "webp");
    $result = 0;
    $msg = "";

    // Check if it is actually an image
    $imageSize = getimagesize($image["tmp_name"]);
    if ($imageSize === false) {
        $msg .= "Please load an image! ";
    }

    // Check if image dimension is < 500 KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "The image loaded is too much heavy! Maximum dimension allowed is: $maxKB KB. ";
    }

    // Check if the extension is correct
    $imageFileType = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Only the following extensions are accepted: ".implode(",", $acceptedExtensions);
    }

    // Check if the filename already exists and avoid collisions
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    // Move the file from the temporary directory to the upload directory
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }

    return array($result, $msg);
}

function var_dump_plus($expression) {
    echo '<pre>';
    var_dump($expression);
    echo '</pre>';
}

function send_json_data($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
}

function discounted_price($val, $discount){
    return $val - ($val * $discount) / 100;
}

?>
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

function validate_height($height) {
    if ($height > max_height) {
        return max_height;
    } else if($height < default_height) {
        return default_height;
    } else {
        return $height;
    }
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

function getOrientation($image) {
    $image_properties = getimagesize($image);
    if($image_properties[0] >= $image_properties[1]) {
        return Orientation::Landscape;
    } else {
        return Orientation::Portrait;
    }
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "webp");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
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
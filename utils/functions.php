<?php

abstract class UserType {
    const Seller = "seller";
    const Customer = "customer";
}

abstract class CartAction {
    const Add_item = 1;
    const Remove_item = 0;
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
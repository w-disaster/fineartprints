<?php

abstract class UserType {
    const Seller = "seller";
    const Customer = "customer";
}

function isUserLoggedIn($role){
    return !empty($_SESSION["Role"]) && $_SESSION["Role"] == $role;
}

function registerLoggedUser($user){
    $_SESSION["Email"] = $user["Email"];
    $_SESSION["Role"] = $user["Role"];
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
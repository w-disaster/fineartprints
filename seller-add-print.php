<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Add print";
    $templateParams["name"] = "seller-add-print-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";

    $email = htmlspecialchars($_SESSION["email"]);

    if(isset($_POST["author"])) {
        $title = htmlspecialchars($_POST["title"]);
        $description = htmlspecialchars($_POST["description"]);
        $author = htmlspecialchars($_POST["author"]);
        list($image, $msg) = uploadImage(UPLOAD_DIR, $_FILES["picture"]);
        $image_name = basename($image["name"]);
        var_dump($image_name);
        $base_price = htmlspecialchars($_POST["base_price"]);
        $discount = htmlspecialchars($_POST["discount"]);
        $orientation = getOrientation($image); // REVIEW
        $category = htmlspecialchars($_POST["category"]);

        $parameters = array(
            "title" => $title,
            "description" => $description,
            "author" => $author,
            "image" => $image_name,
            "base_price" => $base_price,
            "discount" => $discount,
            "orientation" => $orientation,
            "category" => $category,
            "email" => $email
        );

        $dbh->updatePicture($parameters);
    }

} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Add print";
    $templateParams["name"] = "seller-add-print-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";
    $email = htmlspecialchars($_SESSION["email"]);

    $templateParams["categories"] = $dbh->query("SELECT * From category");
    $techniques = $dbh->query("SELECT * From print_technique");
    $templateParams["techniques"] = $techniques;
    $print_techniques = [];

    var_dump_plus($_POST);
    if(isset($_POST["author"])) {
        $print_id = htmlspecialchars($_POST["title"]);
        $title = getValidTitle($print_id, $dbh);
        $description = htmlspecialchars($_POST["description"]);
        $author = htmlspecialchars($_POST["author"]);
        $base_price = htmlspecialchars($_POST["base_price"]);
        $discount = htmlspecialchars($_POST["discount"]);
        $category = htmlspecialchars($_POST["category"]);

        list($image, $msg) = uploadImage(UPLOAD_DIR, $_FILES["picture"]);
        $image_name = basename($_FILES["picture"]["name"]);
        $fullPath = UPLOAD_DIR.$image_name;
        $orientation = getOrientation($fullPath);

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

        var_dump_plus($parameters);
        $dbh->addPicture($parameters);

        foreach ($techniques as &$technique) {
            $technique_description =str_replace(" ", "_", $technique["Description"]);
            if (isset($_POST[$technique_description])) {
                $dbh->insertSupportedTechniqueForPrint($technique["Technique_id"], $title);
            } else if(!isset($_POST[$technique_description]) && in_array($technique, $print_techniques)) {
                $dbh->deleteSupportedTechniqueFromPrint($technique["Technique_id"], $title);
            }
        }
        unset($technique);
    }


} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
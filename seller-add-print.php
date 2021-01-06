<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Add print";
    $templateParams["name"] = "seller-add-print-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";
    $templateParams["placeholder"] = "placeholder.webp";

    $email = htmlspecialchars($_SESSION["email"]);

    $templateParams["categories"] = $dbh->query("SELECT * From category");
    $techniques = $dbh->query("SELECT * From print_technique");
    $templateParams["techniques"] = $techniques;
    $print_techniques = [];

    if(isset($_POST["author"])) {
        $print_id = htmlspecialchars($_POST["title"]);
        $title = getValidTitle($print_id, $dbh);
        $description = htmlspecialchars($_POST["description"]);
        $author = htmlspecialchars($_POST["author"]);

        if(isInRange(htmlspecialchars($_POST["base_price"]), 0.0, max_price)) {
            $base_price = htmlspecialchars($_POST["base_price"]);
        } else {
            $templateParams["price_error_msg"] = "Please provide a number greater than 0 and smaller than".max_price." .";
        }
    
        if(isInRange(htmlspecialchars($_POST["discount"]), 0.0, 99.99)) {
            $discount = htmlspecialchars($_POST["discount"]);
        } else {
            $templateParams["discount_error_msg"] = "The discount is in percentage. Please provide a number greater than 0 and smaller than 99.99";
        }

        $category = htmlspecialchars($_POST["category"]);

        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["picture"]);

        if ($result && !isset($templateParams["price_error_msg"]) 
                && !isset($templateParams["discount_error_msg"])) {

            $image_name = $msg;
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
        } else {
            $templateParams["image_upload_error_msg"] = $msg;
        }
    }

} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
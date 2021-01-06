<?php
require_once 'bootstrap.php';

if (isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Your prints";
    $templateParams["name"] = "seller-prints-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";
    $email = htmlspecialchars($_SESSION["email"]);
    $templateParams["prints"] = $dbh->getPicturesFromSeller($email);

    if (isset($_GET["print_id"])) {
        $templateParams["print_selected"] = true;
        $print_id = htmlspecialchars($_GET["print_id"]);
        $print = $dbh->getPictureFromTitle($print_id)[0];
        $templateParams["categories"] = $dbh->query("SELECT * From category");
        $techniques = $dbh->query("SELECT * From print_technique");
        $templateParams["techniques"] = $techniques;
        $print_techniques = $dbh->getTechniquesFromPictureTitle($print_id);

        if (isset($_POST["author"])) {
            $title = $print_id;
            $description = htmlspecialchars($_POST["description"]);
            $author = htmlspecialchars($_POST["author"]);

            if(isInRange(htmlspecialchars($_POST["base_price"]), 0.0, max_price)) {
                $base_price = htmlspecialchars($_POST["base_price"]);
            } else {
                $templateParams["price_error_msg"] = "Please provide a number greater than 0 and smaller than ".max_price;
            }
        
            if(isInRange(htmlspecialchars($_POST["discount"]), 0.0, 99.99)) {
                $discount = htmlspecialchars($_POST["discount"]);
            } else {
                $templateParams["discount_error_msg"] = "The discount is in percentage. Please provide a number greater than 0 and smaller than 99.99";
            }

            $category = htmlspecialchars($_POST["category"]);

            /**
             * Check if a new image was uploaded. If it isn't reuse the current image.
             */
            if (!empty($_FILES["picture"]["name"])) {
                list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["picture"]);
            } else {
                $image_name = $print["Image"];
                $orientation = htmlspecialchars($print["Orientation"]);
                $result = true;
                $msg = "";
            }

            if ($result && !isset($templateParams["price_error_msg"]) 
                    && !isset($templateParams["discount_error_msg"])) {

                if (!empty($_FILES["picture"]["name"])) {
                    $image_name = $msg;
                    $fullPath = UPLOAD_DIR . $image_name;
                    $orientation = getOrientation($fullPath);
                }

                $parameters = array(
                    "description" => $description,
                    "author" => $author,
                    "image" => $image_name,
                    "base_price" => $base_price,
                    "discount" => $discount,
                    "orientation" => $orientation,
                    "category" => $category,
                    "email" => $email
                );

                $dbh->updatePicture($parameters, $title);

                foreach ($techniques as &$technique) {
                    $technique_description = str_replace(" ", "_", $technique["Description"]);
                    if (isset($_POST[$technique_description]) && !in_array($technique, $print_techniques)) {
                        $dbh->insertSupportedTechniqueForPrint($technique["Technique_id"], $print_id);
                    } else if (!isset($_POST[$technique_description]) && in_array($technique, $print_techniques)) {
                        $dbh->deleteSupportedTechniqueFromPrint($technique["Technique_id"], $print_id);
                    }
                }
                unset($technique);

            } else {
                $templateParams["image_upload_error_msg"] = $msg;
            }

            /**
             * Update current image and techniques shown in the page
             */
            $print = $dbh->getPictureFromTitle($print_id)[0];
            $print_techniques = $dbh->getTechniquesFromPictureTitle($print_id);
        }
    } else {
        $templateParams["print_selected"] =  false;
    }
} else {
    header('Location: login.php');
}

require 'template/base.php';

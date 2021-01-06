<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Your prints";
    $templateParams["name"] = "seller-prints-template.php";
    $templateParams["sidebar"] = "seller-sidebar.php";
    $email = htmlspecialchars($_SESSION["email"]);
    $templateParams["prints"] = $dbh->getPicturesFromSeller($email);

    if(isset($_GET["print_id"])) {
        $templateParams["print_selected"] = true;
        $print_id = htmlspecialchars($_GET["print_id"]);
        $print = $dbh->getPictureFromTitle($print_id)[0];
        $templateParams["categories"] = $dbh->query("SELECT * From category");
        $techniques = $dbh->query("SELECT * From print_technique");
        $templateParams["techniques"] = $techniques;
        $print_techniques = $dbh->getTechniquesFromPictureTitle($print_id);

        if(isset($_POST["author"])) {
            $title = $print_id;
            $description = htmlspecialchars($_POST["description"]);
            $author = htmlspecialchars($_POST["author"]);
            $base_price = htmlspecialchars($_POST["base_price"]);
            $discount = htmlspecialchars($_POST["discount"]);
            $category = htmlspecialchars($_POST["category"]);

            /**
             * Check if a new image was uploaded. If it isn't reuse the current image.
             */
            if(!empty($_FILES["picture"]["name"])) {
                list($image, $msg) = uploadImage(UPLOAD_DIR, $_FILES["picture"]);
                $image_name = basename($_FILES["picture"]["name"]);
                $fullPath = UPLOAD_DIR.$image_name;
                $orientation = getOrientation($fullPath);
            } else {
                $image_name = $print["Image"];
                $orientation = htmlspecialchars($print["Orientation"]);
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
        }

        foreach ($techniques as &$technique) {
            $technique_description =str_replace(" ", "_", $technique["Description"]);
            if (isset($_POST[$technique_description]) && !in_array($technique, $print_techniques)) {
                $dbh->insertSupportedTechniqueForPrint($technique["Technique_id"], $print_id);
            } else if(!isset($_POST[$technique_description]) && in_array($technique, $print_techniques)) {
                $dbh->deleteSupportedTechniqueFromPrint($technique["Technique_id"], $print_id);
            }
        }
        unset($technique);

        /**
         * Update current image and techniques shown in the page
         */
        $print = $dbh->getPictureFromTitle($print_id)[0];
        $print_techniques = $dbh->getTechniquesFromPictureTitle($print_id);

    } else {
        $templateParams["print_selected"] =  false;
    }

} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
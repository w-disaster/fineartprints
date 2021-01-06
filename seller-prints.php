<?php
require_once 'bootstrap.php';

if(isUserLoggedIn(UserType::Seller)) {
    $templateParams["title"] = "Seller Area - Your prints";
    $templateParams["name"] = "seller-prints-template.php";
    $email = htmlspecialchars($_SESSION["email"]);
    $templateParams["prints"] = $dbh->getPicturesFromSeller($email);

    if(isset($_GET["print_id"])) {
        $templateParams["print_selected"] = true;
        $print_id = htmlspecialchars($_GET["print_id"]);
        $print = $dbh->getPictureFromTitle($print_id)[0];
        $templateParams["categories"] = $dbh->query("SELECT * From category");
        $templateParams["techniques"] = $dbh->query("SELECT * From print_technique");
        $print_techniques = $dbh->getTechniquesFromPictureTitle($print_id);

        if(isset($_POST["author"])) {

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
        $templateParams["print_selected"] =  false;
    }

} else {
    header('Location: login.php');
}

require 'template/base.php';
?>
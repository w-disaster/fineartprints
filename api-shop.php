<?php
require_once 'bootstrap.php'; 

$templateParams["url"] = "api-shop.php";
$templateParams["css"] = "shop_style.css";
$templateParams["filtered_categories"] = [];
$templateParams["filtered_authors"] = [];

if(isset($_GET["category"]) || isset($_POST["authors"]) || isset($_POST["order"]) || isset($_POST["techniques"]) || isset($_POST["sale"])){
    
    $query = "SELECT * FROM Picture WHERE ";
    /* AUTHOR */
    $query_authors = "1 "; 
    if(isset($_POST["authors"])){
        $authors = $_POST["authors"];
        $query_authors = "Picture.Author IN ('";
        $query_authors = $query_authors.implode("', '", $authors)."') ";
        $templateParams["filtered_authors"] = $authors;
    }

    $query_categories = "1 ";
    if(isset($_POST["categories"])){
        $categories = $_POST["categories"];
        $query_categories = "Category_name IN('".implode("', '", $categories)."') ";
        $templateParams["filtered_categories"] = $categories;

    } else if(isset($_GET["category"])){

        $templateParams["url"] = $templateParams["url"]."?category=".$_GET["category"];
        $query_categories = "Category_name='".$_GET["category"]."' ";
        $templateParams["filtered_categories"] = array($_GET["category"]);
    }

    /* SELECT (ALL / DISCOUNT) */
    $query_select = "1 ";
    if(isset($_POST["select"])){
        $select = $_POST["select"];
        if($select == "sale"){
            $query_select = "Picture.Discount > 0 ";
        }
    }

    /* ORDER */
    $query_order = "";
    if(isset($_POST["order"])){
        $order = $_POST["order"];
        $query_order = "ORDER BY ";
        switch($order){
            case "none":
                $query_order = "";
                break;
            case "publish_date":
                $query_order = $query_order."Picture.Publish_date DESC";
                break;
            case "cost_rising":
                $query_order = $query_order."Picture.Base_price - (Picture.Base_price * Picture.Discount)/100 ASC";
                break;
            case "cost_decreasing":
                $query_order = $query_order."Picture.Base_price - (Picture.Base_price * Picture.Discount)/100 DESC";
                break;
        }
    }

    $query = $query.$query_authors."AND ".$query_categories."AND ".$query_select.$query_order;
    $templateParams["pictures"] = $dbh->query($query);

}else{
    $templateParams["pictures"] = $dbh->query("SELECT * FROM Picture");
}

/* TECNICHE */
$query = "SELECT DISTINCT Description FROM Print_technique";
$templateParams["print_techniques"] = $dbh->query($query);

/* AUTORI */
$query = "SELECT DISTINCT Author FROM Picture";
$templateParams["authors"] = $dbh->query($query);

/* CATEGORIE */
$query = "SELECT Name FROM Category";
$templateParams["all_categories"] = $dbh->query($query);

/*
$technique_array = [];
foreach($templateParams["pictures"] as $picture){
    $technique_array = array_merge($technique_array, $dbh->getTecnhiquesFromPictureTitle($picture["Title"])); 
}
var_dump($technique_array);*/

//Base Template
$templateParams["title"] = "Shop";
$templateParams["name"] = "shop.php";


require 'template/base.php';
?>
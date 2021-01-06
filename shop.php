<?php
require_once 'bootstrap.php'; 
require_once 'utils/shop-filters.php';

$templateParams["filtered_categories"] = [];
$templateParams["filtered_authors"] = [];
$templateParams["select"] = "all";
$templateParams["order"] = "none";

$filters = new ShopFilters();
$templateParams["pictures"] = $dbh->query("SELECT * FROM picture");

if(isset($_GET["category"]) || isset($_POST["categories"]) || isset($_POST["authors"])){

    /* Filtered authors */
    if(isset($_POST["authors"])){
        $templateParams["filtered_authors"] = $_POST["authors"];
        $filters->setFilteredAuthors($templateParams["filtered_authors"]);
        $templateParams["pictures"] = $filters->filter_pictures_by_authors($templateParams["pictures"]);
    }

    /* Filtered categories */
    if(isset($_POST["categories"])){
        $templateParams["filtered_categories"] = $_POST["categories"];
        $filters->setFilteredCategories($templateParams["filtered_categories"]);
        $templateParams["pictures"] = $filters->filter_pictures_by_categories($templateParams["pictures"]);

    } else if(isset($_GET["category"])){
        $templateParams["filtered_categories"] = array($_GET["category"]);
        $filters->setFilteredCategories($templateParams["filtered_categories"]);
        $templateParams["pictures"] = $filters->filter_pictures_by_categories($templateParams["pictures"], $templateParams["filtered_categories"]);
    }
}

if(isset($_POST["order"]) || isset($_POST["select"])){

    /* Select (all / sales) */
    if(isset($_POST["select"])){
        $templateParams["select"] = $_POST["select"];
        if($templateParams["select"] == "sale"){
            $templateParams["pictures"] = $filters->filter_pictures_in_sale($templateParams["pictures"]);
        }
    }

    /* Order*/
    if(isset($_POST["order"])){
        $templateParams["order"] = $_POST["order"];
        $filters->setOrderFilter($templateParams["order"]);
        $templateParams["pictures"] = $filters->filter_order($templateParams["pictures"]);
    }  
}

/* All authors */
$templateParams["authors"] = $dbh->query("SELECT DISTINCT Author FROM picture");

/* All categories */
$templateParams["all_categories"] = $dbh->query("SELECT Name FROM category");

//Base Template
$templateParams["title"] = "Shop";
$templateParams["name"] = "shop-template.php";

require 'template/base.php';
?>
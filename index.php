<?php
require_once 'bootstrap.php';


if(isset($_POST["authors"]) || isset($_POST["order"]) || isset($_POST["techniques"]) || isset($_POST["sale"])){
    
    $query = "SELECT * FROM Picture WHERE ";
    
    /* AUTHOR */
    $query_authors = "1 "; 
    if(isset($_POST["authors"])){
        $authors = $_POST["authors"];
        $query_authors = "Picture.Author IN (";
        $n = count($authors);
        for($i = 0; $i < $n - 1; $i++){
            $query_authors = $query_authors."'".$authors[$i]."', ";
        }
        $query_authors = $query_authors."'".$authors[$n - 1]."') ";
    }

    /* TECHNIQUE */
    $query_techniques = "1 ";
    if(isset($_POST["techniques"])){
        $techniques = $_POST["techniques"];
        $query_techniques = "Picture.Title = Art_print.Picture_title AND Art_print.Technique_id = Print_technique.Technique_id AND Print_technique.Description IN (";
        $n = count($techniques);
        for($i = 0; $i < $n - 1; $i++){
            $query_techniques = $query_techniques."'".$techniques[$i]."', ";
        }
        $query_techniques = $query_techniques."'".$authors[$n - 1]."') ";
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

    $query = $query.$query_authors."AND ".$query_techniques."AND ".$query_select.$query_order;
    $templateParams["pictures"] = $dbh->query($query);

}else{
    $templateParams["pictures"] = $dbh->getAllPictures();
}

/* TECNICHE */
$query = "SELECT DISTINCT Description FROM Print_technique";
$templateParams["print_techniques"] = $dbh->query($query);

/* AUTORI */
$query = "SELECT DISTINCT Author FROM Picture";
$templateParams["authors"] = $dbh->query($query);

/*
$technique_array = [];
foreach($templateParams["pictures"] as $picture){
    $technique_array = array_merge($technique_array, $dbh->getTecnhiquesFromPictureTitle($picture["Title"])); 
}
var_dump($technique_array);*/

//Base Template
$templateParams["titolo"] = "Shop";
$templateParams["nome"] = "shop.php";


require 'template/base.php';
?>
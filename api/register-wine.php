<?php
    //include 'db.include.php';
    //$conn = getDatabaseConnection(); //gets database
    require_once("../lib/wineBottle.php");
    if(isset($_POST['regWine'])){
        //var_dump($_POST);
        $producer = $_POST["producer"];
        //echo $producer;
        $wine_name = $_POST["wname"];
        //echo $name;
        $vintage = $_POST["vintage"];
        //echo $vintage;
        $wine_style = $_POST['wine_styles'];
        //echo $wine_style;
        $grapes = $_POST["grape"];
        //echo $grape;
        $country = $_POST["country"];
        //echo $region_country;
        $state = $_POST["state"];
        //echo $region_state;
        $region = $_POST["region"];//optional so test it
        //echo $region;
        //$sub_region =$_POST["sRegion"]; //optional so test it
        //echo $sub_region;
        $alcohol = $_POST["alcohol"];
        $regBottle = new RegBottle();
        $regBottle::insertBottle($producer, $wine_name, $vintage, $wine_style,
        $grapes, $country, $state, $region, $alcohol);
    }
    header("Location: ../index.php");
?>

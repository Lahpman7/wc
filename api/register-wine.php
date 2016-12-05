<?php

    require_once("../lib/wineBottle.php");
    date_default_timezone_set('America/Los_Angeles');
    $date = date('l jS \of F Y h:i:s A');

    if(isset($_POST['regWine'])){
        $regBottle = new RegBottle();
        $regBottle::insertBottle($_POST["producer"], $_POST["wname"], $_POST["vintage"], $_POST['wine_styles'],
        $_POST["grape"], $_POST["country"], $_POST["state"], $_POST["region"], $_POST["alcohol"]);

        $log = $date . ' Success, Bottle Registered ---> Producer: '. $_POST["producer"].' Wine Name: '. $_POST["wname"].' Vintage: ' . $_POST["vintage"].' Wine Style: ' . $_POST['wine_styles'].' Grape: ' .
        $_POST["grape"].' Country: ' . $_POST["country"].' State: ' . $_POST["state"].' Region: ' . $_POST["region"].' Alcohol \% ' . $_POST["alcohol"] .'\n';
    }
    else{
        $log = $date . 'Unauthorized access to register-wine.php, post not set, redirect home.';
    }
    error_log($log);
    header("Location: ../index.php");
?>

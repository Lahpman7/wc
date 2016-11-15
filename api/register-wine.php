<?php

    require_once("../lib/wineBottle.php");
    if(isset($_POST['regWine'])){
        $regBottle = new RegBottle();
        $regBottle::insertBottle($_POST["producer"], $_POST["wname"], $_POST["vintage"], $_POST['wine_styles'],
        $_POST["grape"], $_POST["country"], $_POST["state"], $_POST["region"], $_POST["alcohol"]);
    }
    header("Location: ../index.php");
?>

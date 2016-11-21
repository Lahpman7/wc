<?php
     include 'db.include.php';
     include '../lib/aromas.php';
    $conn = getDatabaseConnection(); //gets database connection

    $varquery = $_GET["var"]; 
    $newAroma = new Aromas();
    $aromas = $newAroma::getAromas(1,$varquery);

    header('Content-type: application/json');
    echo json_encode($aromas);
?>
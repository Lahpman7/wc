<?php
    include 'db.include.php';
    $conn = getDatabaseConnection(); //gets database connection

    $varquery = $_GET["var"];
    $sql = "SELECT " . $varquery . " FROM aromas WHERE color_key = 1 AND LENGTH(" .$varquery . ") > 0";

    $statement = $conn->prepare($sql);
    $statement->execute();
    $record = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    header('Content-type: application/json');
   // print_r($record);
    echo json_encode($record);
?>
<?php 
    include 'db.include.php';
    $conn = getDatabaseConnection(); //gets database connection
    $varsearch = $_GET["var"];

    $sql = "SELECT :varsearch FROM aromas WHERE color_key = 0 AND LENGTH(:samesearch) > 0";
   // $sql = "SELECT :username FROM `login`";

    $statement = $conn->prepare($sql); // prevents sql injection
    $statement->execute( array(":varsearch" => $varsearch ,":samesearch" => $varsearch));
    $record = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    header('Content-type: application/json');
    //print_r($record);
     echo json_encode($record);
     //essentially returns data back to caller for var retrieval
?>

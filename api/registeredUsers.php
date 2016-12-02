<?php
    include 'db.include.php';
    $conn = getDatabaseConnection(); //gets database connection


    $sql = "SELECT username, email,firstname, lastname, employment, img_url FROM registered_user";
    //echo $query';

    $statement = $conn->prepare($sql); // prevents sql injection
    $statement->execute();
    $record = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();


    header('Content-type: application/json');
    echo json_encode($record);
?>

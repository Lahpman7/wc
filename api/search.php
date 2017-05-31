<?php
    include 'db.include.php';
    $conn = getDatabaseConnection(); //gets database connection

    $query = $_GET['q'];
    $likeString = '%' . $query . '%';
    $sql = "SELECT producer, wine_name, vintage, wine_style FROM wine_bottle
    WHERE wine_name LIKE :query OR producer LIKE :queryTwo";
    //echo $query';
    $statement = $conn->prepare($sql);
    $statement->bindParam(':query', $likeString);
    $statement->bindParam(':queryTwo', $likeString);
    $statement->execute();
    $record = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    //adds an extra key to each array that will be used in the front end
    for ($i = 0; $i < count($record); $i++) {
        if( preg_match("/[wW]hite/", $record[$i]['wine_style']) == 1 ){
             $record[$i]['destination'] = 'white';

         }else{
             $record[$i]['destination'] = 'red';
         }
     }
    header('Content-type: application/json');
    echo json_encode($record);
?>

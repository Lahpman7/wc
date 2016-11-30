<?php
  session_start();
  include "db.include.php";
  $db = getDatabaseConnection();
  
  $sql = "SELECT *  FROM assessment ORDER BY date DESC";

  $statement = $db->prepare($sql);
  $statement->execute();
  $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor;

  header('Content-type: application/json');
  echo json_encode($records);
 ?>

<?php
  include "db.include.php";

  $db = getDatabaseConnection();
  $sql = "SELECT * FROM wine_bottle";
  $val = $db->prepare($sql);
  $val->execute();
  $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);


  header('Content-type: application/json');
  echo json_encode($retrieval);

 ?>

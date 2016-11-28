<?php
  session_start();
  include "db.include.php";
  $db = getDatabaseConnection();
  $username = $_SESSION['email'];

  if($username == 'admin'){
  	$sql = "SELECT *  FROM assessment";
  }else{
  	$sql = "SELECT *  FROM assessment WHERE username = " . $username;
  }
  //$sql = "SELECT *  FROM assessment";
  $statement = $db->prepare($sql);
  $statement->execute();
  $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor;

  header('Content-type: application/json');
  echo json_encode($records);
 ?>

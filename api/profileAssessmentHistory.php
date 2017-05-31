<?php
  session_start();
  include "db.include.php";
  $db = getDatabaseConnection();
  $username = $_GET['username'];

  date_default_timezone_set('America/Los_Angeles');
  $date = date('l jS \of F Y h:i:s A');

  $sql = "SELECT *  FROM assessment WHERE username = :uname ORDER BY date DESC";
  $statement = $db->prepare($sql);
  $statement->bindParam(':uname', $username);
  $statement->execute();
  $records = $statement->fetchAll(PDO::FETCH_ASSOC);
  $statement->closeCursor;
  $log = $date.'retriving assessments from '.$username.'\n';
  error_log($log);
  header('Content-type: application/json');
  echo json_encode($records);
 ?>

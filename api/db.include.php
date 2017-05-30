<?php
    function getDatabaseConnection() {

      $host = '127.0.0.1';
      $dbname = "wc_db";
      $username = "root";
      $password = "";

        try{
                $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $conn = $dbConn;
        }
        catch(PDOException $e){
                echo $e->getMessage();
        }
        return $conn;
    }
?>

<?php
    require '../vendor/autoload.php';
    $dotenv = new Dotenv\Dotenv('../');
    $dotenv->load();
    function getDatabaseConnection() {
      $host = getenv('DB_HOST');
      $dbname = getenv('DB_NAME');
      $username = getenv('USER_NAME');
      $password = getenv('PASS');

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

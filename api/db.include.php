<?php
    function getDatabaseConnection() {
        echo "db";
        $host = "localhost";
        $dbname = "db_wc";
        $username = "root";
        $password = "root";

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
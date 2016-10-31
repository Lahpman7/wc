<?php
    function getDatabaseConnection() {
        //echo "DB";
        $host = "localhost";
        $dbname = "wc_db";
        $username = "masloph";
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
<?php
    function getDatabaseConnection() {
        //echo "DB";

        $host = "wc-database.cvuylrrqda7p.us-west-1.rds.amazonaws.com";
        $dbname = "wc_db";
        $username = "wc_user";
        $password = "wc4tw!123";
        /*
        $host = 'localhost';
        $dbname = "wc_db";
        $username = "masloph";
        $password = "";
        */
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
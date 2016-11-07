<?php
class Database {
        private static $instance = NULL;
        private function __construct() {}
        private function __clone() {}
           
public static function getInstance() {
        //hardcoded values need to change later 
        /*
        $host = "localhost";
        $dbname = "wc_db";
        $username = "masloph";
        $password = "";
        */
        
        $host = "wc-database.cvuylrrqda7p.us-west-1.rds.amazonaws.com";
        $dbname = "wc_db";
        $username = "wc_user";
        $password = "wc4tw!123";
        
        if(!isset(self::$instance)){
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        }
    return self::$instance;
    }
}
?>
<?php
include_once('../api/db.include.php');
class Aromas {
    public static $color;
    public static $name;

    public function __construct(){

    }
    public static function getAromas($color_key, $aroma){
        $db = getDatabaseConnection();
        $sql = "SELECT :aroma FROM aromas WHERE color_key = :color_key AND LENGTH(:aromaAgain) > 0";
        $statement = $db->prepare($sql);
        $statement->bindParam(':aroma', $aroma);
        $statement->bindParam(':color_key', $color_key);
        $statement->bindParam(':aromaAgain', $aroma);
        if($statement->execute()){
          $records = $statement->fetchAll(PDO::FETCH_ASSOC);
          return $records;
        } else {
          // die(var_dump($val->errorInfo()));
          return false;
        }
    }
}
?>

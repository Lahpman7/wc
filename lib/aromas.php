<?php 
include_once('database.php');
class Aromas {
    public static $color;
    public static $name;
    public function __construct(){
        
    }

    public static function getAromas($color_key, $aroma){
        $db = Database::getInstance();
        $sql = "SELECT " . $aroma . " FROM aromas WHERE color_key = ". $color_key ." AND LENGTH(" .$aroma . ") > 0";
        $statement = $db->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
}
?>

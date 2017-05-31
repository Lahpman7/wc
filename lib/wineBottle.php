<?php
include_once('../api/db.include.php');
class RegBottle{
    public static $producer;
    public static $wine_name;
    public static $vintage;
    public static $wine_style;
    public static $grapes;
    public static $country;
    public static $state;
    public static $city;
    public static $region;
    public static $alcohol;
    public function __construct(){
        }

    public static function insertBottle($producer, $wine_name, $vintage, $wine_style,$grapes, $country, $state, $region, $alcohol){
            $db = getDatabaseConnection();
            $sql = "INSERT INTO wine_bottle (producer, wine_name, vintage, wine_style, grapes, country, state, region, alcohol)
            VALUES(?,?,?,?,?,?,?,?,?);";

            $val = $db->prepare($sql);
            $val->bindParam(1, $producer);
            $val->bindParam(2, $wine_name);
            $val->bindParam(3, $vintage);
            $val->bindParam(4, $wine_style);
            $val->bindParam(5, $grapes);
            $val->bindParam(6, $country);
            $val->bindParam(7, $state);
            $val->bindParam(8, $region);
            $val->bindParam(9, $alcohol);

            if($val->execute()){
                return true;
            }
            else{
                return false;
            }
    }

    public static function deleteBottle($producer){
               $db = getDatabaseConnection();
                $sql = "DELETE FROM wine_bottle WHERE producer = :producer";
                $val = $db->prepare($sql);
                $val->bindParam(':producer', $producer);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }

    public static function retrieveBottle($wine_name){
        $db = getDatabaseConnection();
        $sql = "SELECT wine_name FROM wine_bottle WHERE wine_name = :wine_name";

        $val = $db->prepare($sql);
        $val->bindParam(':wine_name', $wine_name);
        $val->execute();
        $retrieval = $val->fetch();

        if($wine_name == $retrieval['wine_name']){

            return $retrieval['wine_name'];
        }
        else{
            return "";
        }
    }

    public static function updateBottleGrapes($producer,$wine_name,$grapes){
        $db = getDatabaseConnection();
        $sql = "UPDATE wine_bottle
                SET grapes = :grapes
                WHERE wine_name = :wine_name
                AND producer = :producer";

        $val = $db->prepare($sql);
        $val->bindParam(':grapes', $grapes);
        $val->bindParam(':wine_name', $wine_name);
        $val->bindParam(':producer', $producer);
        if($val->execute()){
            return true;
        }
        return false;
    }

    public static function retrieveAll(){
        $db = getDatabaseConnection();
        $sql = "SELECT * FROM wine_bottle";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($retrieval);
    }
}
?>

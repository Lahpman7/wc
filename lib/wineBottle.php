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
        $db = getDatabaseConnection();
    } 

    public static function insertBottle($producer, $wine_name, $vintage, $wine_style, 
            $grapes, $country, $state, $region, $alcohol){
            $sql = "INSERT INTO wine_bottle (producer, wine_name, vintage, wine_style, grapes, country, state, region, alcohol) 
            VALUES('$producer', '$wine_name','$vintage', '$wine_style', '$grapes', '$country',
                '$state','$region','$alcohol');";
          
            $val = $db->prepare($sql);
            if($val->execute()){
                return true;
            }
            else{
                return false;
            }
    }

    public static function deleteBottle($producer, $wine_name, $vintage, $wine_style,
            $grapes, $country, $state, $city, $region, $alcohol){
                $sql = "DELETE FROM wine_bottle WHERE producer = '$producer'";
                $val = $db->prepare($sql);
                if($val->execute()){
                    return true;
                }
                else{
                    return false;
                }
    }

    public static function retrieveBottle($wine_name){
       
        $sql = "SELECT wine_name FROM wine_bottle WHERE wine_name ='$wine_name'";
        
        $val = $db->prepare($sql);
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
        $sql = "UPDATE wine_bottle 
                SET grapes = '$grapes'
                WHERE wine_name ='$wine_name' 
                AND producer = '$producer'";
        $val = $db->prepare($sql);
        if($val->execute()){
            return true;
        }
        return false; 
    }

    public static function retrieveAll(){
        $sql = "SELECT * FROM wine_bottle";
        $val = $db->prepare($sql);
        $val->execute();
        $retrieval = $val->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($retrieval);
    }
}
?>
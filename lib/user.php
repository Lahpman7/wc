<?php 
include_once('database.php');
session_start();
class RegUser {
    public static $name;
    public static $email;
    public function __construct(){
        
    }

   //function if the user exits 
   public static function isUser($uname){
        //select statement for pulling user name
        $db = Database::getInstance();
        $sql = "SELECT username FROM user WHERE username ='$uname'";
        $val = $db->prepare($sql);
        $val->execute();
        $shoop = $val->fetch();
        //echo $sql;
        //var_dump($shoop);
        if($uname == $shoop['username']){
            //echo "hit";
            return true;
        }
        else 
        {
            return false;
        }
    }

    public static function insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert_body,$date){
        
       $db = Database::getInstance();
       $sql= "INSERT INTO user (username, password, email,firstname,lastname, age, zipcode, employment,cert_body,date_cert) VALUES 
        ('$username','$password','$email','$firstname','$lastname',$age,$zipcode,'$employment','$cert_body',$date)";
       $val = $db->prepare($sql);
       
       if($val->execute()){
                return true;
        }
        else{
            return false;
        }
    }
    
    public static function deleteUser($uname){
        $db = Database::getInstance();
        $sql = "DELETE FROM user WHERE username ='$uname'";
        $val = $db->prepare($sql);
            if($val->execute()){
                return true;
            }
            else{
                return false;
            }
    }
    
   /* public static function updateUser($oldUserName,$newUserName){
        $db = Database::getInstance();
        $sql = "UPDATE user
			SET username = '$newUserName' 
			WHERE username = '$oldUsername'";
		//is this an admin tool? if not we should check to see if session is equal to old username
		$val = $db->prepare($sql);
	    if($val->execute()){
	        $_SESSION['username'] = $newUserName;
            return true;
        }
        else{
            return false;
        }
    }
    */
    public static function updatePass($newPassword,$currentUsername){
        $db = Database::getInstance();
        $sql = "UPDATE user
			SET password = '$newPassword' 
			WHERE username = '$currentUsername'";
			
		$val = $db->prepare($sql);
	    if($val->execute()){
            return true;
        }
         else{
             return false;
        }
    }
}
?>

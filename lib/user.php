<?php
include_once('../api/db.include.php');

class RegUser {
    public static $name;
    public static $email;
    public function __construct(){
        $db = getDatabaseConnection();
    }

   //function if the user exits
   public static function isUser($uname){
        //select statement for pulling user name
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
       $sql= "INSERT INTO user (username, password, email,firstname,lastname, age, zipcode, employment,cert_body,date_cert) VALUES
        ('$username','$password','$email','$firstname','$lastname','$age','$zipcode','$employment','$cert_body','$date')";
       $val = $db->prepare($sql);

       if($val->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public static function deleteUser($uname){
        $sql = "DELETE FROM user WHERE username ='$uname'";
        $val = $db->prepare($sql);
        if($val->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public static function updatePassword($newPassword,$currentUsername){
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
    public static function updateEmail($newEmail,$currentUsername){
        $sql = "UPDATE user
        SET email = '$newEmail'
        WHERE username ='$currentUsername'";

        $val = $db->prepare($sql);
        if($val->execute()){
            return true;
        }
         else{
             return false;
        }
    }

    public static function updateZip($newZip,$currentUsername){
        $newZipcode = intval($newZip);
        $sql = "UPDATE user
			  SET zipcode = '$newZipcode'
			  WHERE username = '$currentUsername'";

        $val = $db->prepare($sql);

  	    if($val->execute()){
              return true;
          }
        return false;
    }

    public static function getPassword($username){
        $sql = "SELECT password
        FROM user
        WHERE username = '$username'";
        $val = $db->prepare($sql);
        $val->execute();
        $record = $val->fetch(PDO::FETCH_ASSOC);
        return $record['password'];
    }

    public static function emailExists($fbEmail){
        $sql = "SELECT email FROM user WHERE email ='$fbEmail'";
        $val = $db->prepare($sql);
        $val->execute();
        $shoop = $val->fetch();

        if($fbEmail == $shoop['email']){
            return true;
        }
        else {
            return false;
        }
    }

}
?>

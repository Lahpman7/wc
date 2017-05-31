<?php
include_once('../api/db.include.php');

class RegUser {
    public static $name;
    public static $email;
    public function __construct(){
    }

   //function if the user exits
   public static function isUser($uname){
        //select statement for pulling user name
        $db = getDatabaseConnection();
        $sql = "SELECT username FROM user WHERE username = :uname";
        $val = $db->prepare($sql);
        $val->bindParam(':uname', $uname);
        $val->execute();
        $shoop = $val->fetch();
        if($uname == $shoop['username']){
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function insertUser($username, $password, $email, $firstname, $lastname, $age, $zipcode, $employment, $cert_body, $date, $img_url){
       $hashed_pw = password_hash($password, PASSWORD_DEFAULT);
       $db = getDatabaseConnection();
       $sql = "INSERT INTO user (username, password, email, firstname, lastname, age, zipcode, employment, cert_body, date_cert, img_url) VALUES
        (?,?,?,?,?,?,?,?,?,?,?)";
       $val = $db->prepare($sql);
      //  $val->bind_param('sssssiissss', $username, $hashed_pw, $email, $firstname, $lastname, (int) $age, (int) $zipcode, $employment, $cert_body, $date, $imgUrl);
       $val->bindParam(1, $username);
       $val->bindParam(2, $hashed_pw);
       $val->bindParam(3, $email);
       $val->bindParam(4, $firstname);
       $val->bindParam(5, $lastname);
       $val->bindParam(6, $age);
       $val->bindParam(7, $zipcode);
       $val->bindParam(8, $employment);
       $val->bindParam(9, $cert_body);
       $val->bindParam(10, $date);
       $val->bindParam(11, $img_url);

       if($val->execute()){
            // die('done');
            return true;
        }
        else {
            die(var_dump($val->errorInfo()));
            return false;
        }
    }

    public static function deleteUser($uname){
        $db = getDatabaseConnection();
        $sql = "DELETE FROM user WHERE username = :uname";
        $val = $db->prepare($sql);
        $val->bindParam(':uname', $uname);
        if($val->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public static function updatePassword($newPassword, $currentUsername){
        $hashed_pw = password_hash($newPassword, PASSWORD_DEFAULT);
        $db = getDatabaseConnection();
        $sql = "UPDATE user
          			SET password = :password
          			WHERE username = :uname";

        $val = $db->prepare($sql);
        $val->bindParam(':uname', $currentUsername);
        $val->bindParam(':password', $hashed_pw);
  	    if($val->execute()){
            // die(password_verify($newPassword,$hashed_pw));
            return true;
        }
        return false;

    }
    public static function updateEmail($newEmail, $currentUsername){
        $db = getDatabaseConnection();
        $sql = "UPDATE user
                SET email = :email
                WHERE username = :uname";

        $val = $db->prepare($sql);
        $val->bindParam(':email', $newEmail);
        $val->bindParam(':uname', $currentUsername);
        if($val->execute()){
            return true;
        }
         else{
             return false;
        }
    }

    public static function updateZip($newZip, $currentUsername){
        $db = getDatabaseConnection();
        $newZipcode = intval($newZip);
        $sql = "UPDATE user
        			  SET zipcode = :newZip
        			  WHERE username = :currentUsername";

        $val = $db->prepare($sql);
        $val->bindParam(':newZip', $newZipcode);
        $val->bindParam(':currentUsername', $currentUsername);

  	    if($val->execute()){
          return true;
        }
        return false;
    }

    public static function getPassword($username){
        $db = getDatabaseConnection();
        $sql = "SELECT password
                FROM user
                WHERE username = :username";
        $val = $db->prepare($sql);
        $val->bindParam(':username', $username);
        $val->execute();
        $record = $val->fetch(PDO::FETCH_ASSOC);
        return $record['password'];
    }

    public static function emailExists($fbEmail){
        $db = getDatabaseConnection();
        $sql = "SELECT email, username FROM user WHERE email = :fbEmail";
        $val = $db->prepare($sql);
        $val->bindParam(':fbEmail', $fbEmail);
        $val->execute();
        $shoop = $val->fetch();
        //can return a user name here
        if($fbEmail == $shoop['email']){
            $username = $shoop['username'];
            return $username;
        }
        else {
            return false;
        }
    }

}
?>

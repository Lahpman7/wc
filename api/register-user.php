<?php
session_start(); 
require_once("../lib/user.php");
/*$user = new RegUser();
//include "db.include.php";
/*$db = getDatabaseConnection();
$sql= "INSERT INTO user (username, password, email,firstname,lastname, age, zipcode, employment,cert_body,date_cert) VALUES
       ('xyz','1234','anitadoll@me.com','Anita','Garcia',200,93901,'Consumer','Master',2016);";
$statement = $db->prepare($sql);
$statement->execute();
$user::insertUser("xyz1","1234","anitadoll2@me.com","Anita","Garcia",200,93901,"Consumer","Master",2016);
    echo "Done";*/
if(isset($_POST["regAccount"])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $zipcode = $_POST['zipcode'];
    $employment = $_POST['employment'];
    $cert = $_POST['cert_body'];
    $date = $_POST['date'];
    $user = new RegUser();
    $user::insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert,$date);
}
if(isset($_POST['regAccountFB'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $zipcode = $_POST['zipcode'];
    $employment = $_POST['employment'];
    $cert_body = $_POST['cert_body'];
    $date = $_POST['date'];

    $age = $_SESSION['age'];
    $email = $_SESSION['username'];
    $firstname = $_SESSION['first'];
    $lastname = $_SESSION['last'];
    echo $username. ' ' . $password.' '. $email.' '. $firstname.' '. $lastname.' ' .$age.' '.$zipcode.' '.$employment.' '. $cert_body.' '.$date;
    $user = new RegUser();
    $user::insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert_body,$date);
    //need username, pass, age, zip, employment, cert body and date
}
header("Location: ../index.php");
?>

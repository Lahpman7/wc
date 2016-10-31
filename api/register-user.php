<?php 
require_once("../lib/user.php");
if(isset($_POST[regAccount])){
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







?>
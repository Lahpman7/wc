<?php
    include "../lib/user.php";
    //Idea for security, maybe add another condition to see if a certain session(we can use a facebook unique)
    //because users may be able to type in the section url to replicate these actions
    session_start();
    if(isset($_POST['regAccountFB'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $age = $_POST['age']; 
      $zipcode = $_POST['zipcode'];
      $employment = $_POST['employment'];
      $cert = $_POST['cert_body'];
      $date = $_POST['date'];
      $email = $_SESSION['email'];


      $_SESSION['username'] = $username;
      $user = new RegUser();
      $user::insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert_body,$date);
    }

    $user = new RegUser();
    $user::insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert,$date);
?>

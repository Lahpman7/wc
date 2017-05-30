<?php

session_start();
require_once("../lib/user.php");

if(isset($_POST["regAccount"])){

    date_default_timezone_set('America/Los_Angeles');
    $dateStamp = date('l jS \of F Y h:i:s A');

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
    $imgUrl = "images/default_profile_img.png";
    $user = new RegUser();

    $pw2 = sha1($password);
    $log = $dateStamp . '-> Account Created, Details: user: ' .  $username . ' pass:'. $pw2 .' email: ' .$email. ' first: ' .$firstname. ' last: ' .$lastname. ' age: ' . $age . ' zip ' .
              $zipcode . ' employment: ' . $employment . ' certification:  ' . $cert . ' date_cert: ' . $date . ' imgLoc: ' . $imgUrl .' \n';
    error_log($log);

    $user::insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert,$date, $imgUrl);
}
if(isset($_POST['regAccountFB'])){
    date_default_timezone_set('America/Los_Angeles');
    $dateStamp = date('l jS \of F Y h:i:s A');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $zipcode = $_POST['zipcode'];
    $employment = $_POST['employment'];
    $cert_body = $_POST['cert_body'];
    $date = $_POST['date'];

    $age = $_SESSION['age'];
    $email = $_SESSION['email'];
    $firstname = $_SESSION['first'];
    $lastname = $_SESSION['last'];
    $imgUrl = $_SESSION['imageUrl'];
    // echo $username. ' ' . $password.' '. $email.' '. $firstname.' '. $lastname.' ' .$age.' '.$zipcode.' '.$employment.' '. $cert_body.' '.$date;
    $user = new RegUser();

    $pw2 = sha1($password);
    $log = $dateStamp . '-> Account Created, Details: user: ' .  $username . ' pass:'. $pw2 .' email: ' .$email. ' first: ' .$firstname. ' last: ' .$lastname. ' age: ' . $age . ' zip ' .
              $zipcode . ' employment: ' . $employment . ' certification:  ' . $cert_body . ' date_cert: ' . $date . ' imgLoc: ' . $imgUrl .' \n';
    error_log($log);

    $user::insertUser($username,$password,$email,$firstname,$lastname,$age,$zipcode,$employment,$cert_body,$date, $imgUrl);
    //need username, pass, age, zip, employment, cert body and date
}
header("Location: ../index.php");
?>

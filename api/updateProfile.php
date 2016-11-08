<?php
	session_start();
    //include 'db.include.php';
    require_once("../lib/user.php");
    //$conn = getDatabaseConnection(); //gets database connection
    $currentUsername = $_SESSION['username'];
    $currentPassword = $_SESSION['password'];
    
    if(isset($_POST['password']) && !empty($_POST['password'])){
    	$newPassword = $_POST['password'];
    	$currentUsername = $_SESSION['username'];
		$user = new RegUser();
        $user::updatePass($newPassword, $currentUsername);
    }
    header("Location: ../index.php");
?>
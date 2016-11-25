<?php
	session_start();
    //include 'db.include.php';
    require_once("../lib/user.php");
    //$conn = getDatabaseConnection(); //gets database connection
    $currentUsername = $_SESSION['username'];

    if(isset($_POST['password'])){
	    	$newPassword = $_POST['password'];
	    	$currentUsername = $_SESSION['username'];
				$user = new RegUser();
		    $user::updatePassword($newPassword, $currentUsername);
	    }
    header("Location: ../index.php");
?>

<?php
	session_start();
    require_once("../lib/user.php");
    $currentUsername = $_SESSION['username'];

    if(isset($_POST['password'])){
	    	$newPassword = $_POST['password'];
	    	$currentUsername = $_SESSION['username'];
				$user = new RegUser();
		    $user::updatePassword($newPassword, $currentUsername);
	    }
    header("Location: ../index.php");
?>

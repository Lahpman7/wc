<?php
	session_start();
    //include 'db.include.php';
    require_once("../lib/user.php");
    //$conn = getDatabaseConnection(); //gets database connection

    $currentUsername = $_SESSION['username'];
    $currentPassword = $_SESSION['password'];
    if(isset($_POST['username'])){

    	$newUserName = $_POST['username'];
    	//$sql = "UPDATE user
		//	SET username = $newUserName
		//	WHERE username = $currentUsername;"
		$user = new RegUser();
        $user::updateUser($currentUsername,$newUserName);
		//$statement = $conn->prepare($sql);
    	//$statement->execute();
    }
    if(isset($_POST['password'])){
    	 $newPassword = $_POST['password'];
    	 //$sql = "UPDATE user
		//	SET username = $newPassword
		//	WHERE username = $currentPassword;"
		$user = new RegUser();
        $user::updatePass($currentPassword,$newPassword, $currentUsername);
		//$statement = $conn->prepare($sql);
    	//$statement->execute();
    }
?>
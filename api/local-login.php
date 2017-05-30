<?php
  session_start();
  include 'db.include.php';
  $conn = getDatabaseConnection(); //gets database connection
  //fixed login

  //added logout button and session destroy
  if(isset($_POST['logoutForm'])){
      session_destroy();
      header("Location: ../index.php");
  }
  if(isset($_POST['loginForm'])){// checks to see if data submitted
    $email = $_POST['email'];
    $password = $_POST['password'];
    // need to change table name to registered_user and add img_url col before push
    $sql = "SELECT username, password,
            firstname, lastname, email
            FROM user
            WHERE email = :email";

    $namedParameter = array();
    $namedParameter[':email'] = $email;
    $statement = $conn->prepare($sql); // prevents sql injection
    $statement->execute($namedParameter);
    $record = $statement->fetch(PDO::FETCH_ASSOC);

    if (empty($record)){
        //echo $namedParameter[':username'].' '. $namedParameter[':password'];
        header('Content-type: application/json');
        //echo json_encode($record);

    } else {
        // need to use password verification with
        $out = password_hash($password, PASSWORD_DEFAULT);
        die($record['password'] . ' ' . $out );
        $_SESSION['email'] = $record['email'];
        // $_SESSION['imageUrl'] = $record['img_url'];
        $_SESSION['username'] = $record['username'];
        $_SESSION['fullname'] = $record['firstname'] . " " . $record['lastname'];
        header("Location: ../#!/user-profile");
         /*header('Content-type: application/json');
         echo json_encode($reply);*/
    }
  }

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
    $username = $_POST['username'];
    $password = $_POST['password']; //hash("sha1", $_POST['password']) - another example

    $sql = "SELECT username, password,
            firstname, lastname, email, img_url
            FROM registered_user
            WHERE username = :username
            AND password = :password";

    $namedParameter = array();
    $namedParameter[':username'] = $username;
    $namedParameter[':password'] = $password;
    $statement = $conn->prepare($sql); // prevents sql injection
    $statement->execute($namedParameter);
    $record = $statement->fetch(PDO::FETCH_ASSOC);

    if (empty($record)){
        //header('Content-type: application/json');
        //echo json_encode($record);
        header("Location: ../index.php");
        //echo 'empty';

    } else {
        $reply = array();
        $reply['username'] = $record['username'];
        $reply['firstname'] = $record['firstname'];
        $reply['lastname'] = $record['lastname'];
        $_SESSION['imageUrl'] = $record['email'];
        $_SESSION['imageUrl'] = $record['img_url'];
        $_SESSION['username'] = $record['username'];
        $_SESSION['fullname'] = $record['firstname'] . " " . $record['lastname'];
        header("Location: ../#!/user-profile");
         /*header('Content-type: application/json');
         echo json_encode($reply);*/
    }
  }

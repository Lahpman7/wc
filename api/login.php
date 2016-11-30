<?php
        session_start();
        //error_reporting(E_ALL);ini_set('display_errors',1);
        include_once('../lib/user.php');
        require_once '../vendor/php-graph-sdk-5.0.0/src/Facebook/autoload.php';
        //above works on my test page but maybe because I have all in root dir
        //$urlReturn  = 'http://localhost/wc/api/login.php';
        const app_id = '1773451242931017';
        const app_secret = '5a2fd5013528d9551880d8bf247a661e';
        const default_graph_version = 'v2.5';
        $urlReturn = 'http://wcdeploy.csztpytway.us-west-1.elasticbeanstalk.com/api/login.php';

        $facebookLoginObject = new Facebook\Facebook([
            'app_id' => app_id,
            'app_secret' => app_secret,
            'default_graph_version' => default_graph_version,
        ]);

        $helper = $facebookLoginObject->getRedirectLoginHelper();
        $permissions = ['email'];

        try {
        	if (isset($_SESSION['accessToken'])) {
        		$accessToken = $_SESSION['accessToken'];
        	} else {
          		$accessToken = $helper->getAccessToken();
        	}
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
         	echo 'Graph WEB-FB error : ' . $e->getMessage();
          	exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
        	echo 'Facebook SDK returned LOCAL error: ' . $e->getMessage();
          	exit;
         }
        if (isset($accessToken)) {
        	if (isset($_SESSION['accessToken'])) {
        		$facebookLoginObject->setDefaultAccessToken($_SESSION['accessToken']);
        	} else {
        		// getting short-lived access token
        		$_SESSION['accessToken'] = (string) $accessToken;
        	  	// OAuth 2.0 client handler
          		$oAuth2Client = $facebookLoginObject->getOAuth2Client();
        		// Exchanges a short-lived access token for a long-lived one
        		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['accessToken']);
        		$_SESSION['accessToken'] = (string) $longLivedAccessToken;
        		// setting default access token to be used in script
        		$facebookLoginObject->setDefaultAccessToken($_SESSION['accessToken']);
        	}
        	// redirect the user back to the same page if it has "code" GET variable
        	if (isset($_GET['code'])) {
        		//header('Location: ./');
        	}
        	//retrieve payload (fullname,first,last,email,id,age_range('min')
        	try {
        		$payload_request = $facebookLoginObject->get('/me?fields=name,first_name,last_name,email,age_range');
        		$payload = $payload_request->getGraphNode()->asArray();
        	} catch(Facebook\Exceptions\FacebookResponseException $e) {
        		echo 'Graph returned an error: ' . $e->getMessage();
        		session_destroy();
        		// redirecting user back to app login page
        		header("Location: ./");
        		exit;
        	} catch(Facebook\Exceptions\FacebookSDKException $e) {
        		// When validation fails or other local issues
        		echo 'Facebook SDK returned an error: ' . $e->getMessage();
        		exit;
        	}
        	$image = 'https://graph.facebook.com/'.$payload['id'].'/picture?width=200';
  	    	$_SESSION['email'] = $payload['email'];
  	    	$_SESSION['fullname'] = $payload['name'];
          $_SESSION['first'] = $payload['first_name'];
          $_SESSION['last'] = $payload['last_name'];
  	    	$_SESSION['imageUrl'] = $image;
          $_SESSION['age'] = $payload['age_range']['min'];
          //will either need to get username from session in emailExists function or, create a function that returns username to assign in here to cutback on sessions
  	    	// function that checks if its in DB then inserts if not
          $testUser = new RegUser();
          if($testUser::emailExists($_SESSION['email'])){
            //when user email is already in our db, we send them back to index
            $_SESSION['username'] = $testUser::emailExists($_SESSION['email']);
            $continueProfile = '../#!/user-profile';
            header('Location: ' . $continueProfile);
          }
          else{
            $continueReg = '../#!/register-account-fb';
            header('Location: ' . $continueReg);
          }

        } else {
          	$loginUrl = $helper->getLoginUrl($urlReturn, $permissions);
          	header('Location: ' . $loginUrl);
        }
    ?>

<?php 
    require_once ('../vendor/autoload.php');
    if($_SESSION['email']){
    	session_destroy();
    	header('Location: https://winarycode-masloph.c9users.io/wc/');
    }
    session_start();
    //starts session and grabs facebooks(composers) autoloaders
    $fb = new Facebook\Facebook([
        'app_id'=>'1773451242931017',
        'app_secret'=> '5a2fd5013528d9551880d8bf247a661e',
        'default_graph_version'=>'v2.5'
    ]);

    $redirecTo = './login.php';
    //will need to change redirect above when migrating to AWS 
    $helper = $fb->getRedirectLoginHelper();
    try{
        $accessToken = $helper->getAccessToken();
    }
    catch(Facebooks\Exceptions\FacebookResponseException $e){
        echo "Error" . $e->getMessage();
        exit;
    }
    catch(Facebook\Exceptions\FacebookSDKException $e){
        echo " FB SDK ERR". $e->getMessage();
        exit;
    }
    if (isset($accessToken)) {
	  	//logged in
	  	$fb->setDefaultAccessToken($accessToken);
		try {
		  $response = $fb->get('/me?fields=email,name');
		  $userNode = $response->getGraphUser();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'SDK error: ' . $e->getMessage();
		  exit;
		}
		// Payload, where we could see if its in database, if not insert.
		$_SESSION['name'] = $userNode->getName();
		$_SESSION['id'] = $userNode->getId();
		$_SESSION['email'] = $userNode->getProperty('email');
		$_SESSION['image'] = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=400';
		header('Location: https://winarycode-masloph.c9users.io/wc/');
	}else{
	    //may be ugly, but I can add the basic login form here as well. DONE
	    echo '<form action = " " method = "POST">';
	    echo 'Login<br>Username<input type="text" name = "uName"> <br>';
	    echo 'Password <input type = "password" name = "passWord"><br>';
	    echo '<button name="signIn" type="submit">Login</button>';
	    echo '</form>';
	    echo '<br>Alternative Log in Methods<br>';
	    
		$permissions  = ['email'];
		$loginUrl = $helper->getLoginUrl($redirecTo,$permissions);
	
		echo '<a href="' . $loginUrl . '">';
		echo '<img src="https://s12.postimg.org/d6dhoc20d/FBlogin.png"></a>';
	}
?>
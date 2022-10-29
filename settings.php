<?php

include_once 'gpConfig.php';
include_once 'User.php';
//Koneksi Firebase
//ibase_close($db1);
//echo "Connection failed.". ibase_errmsg();

if (isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture']
    );
    $userData = $user->checkUser($gpUserData);
    
    

	//Storing user data into session
    $_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    if(!empty($userData)){
        //udah login
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
}

?>
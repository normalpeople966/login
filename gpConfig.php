<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '363512328822-8lq45o13qtlnk64fmqvv2sqifhb6imtl.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'i11YbFGgHdbOiaK-N0kJ5oCt'; //Google client secret
$redirectURL = 'http://127.0.0.1/edp_uas/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Localhost');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
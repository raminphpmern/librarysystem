<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '717883882351-1fm9jh9r7n4g8f7asq8vkbsn39g44e8u.apps.googleusercontent.com';
$clientSecret = '-IamkutXYJRK6ONsO3u4Ycvn';
$redirectURL = 'http://localhost/librarysystem/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('librarysystem');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
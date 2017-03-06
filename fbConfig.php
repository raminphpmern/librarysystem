<?php
//session_start();
//Include Facebook SDK
require_once 'inc/facebook.php';
/*
 * Configuration and setup FB API
 */
$appId = '1207301032650517'; //Facebook App ID
$appSecret = 'cd2f417b7de301309d090d7227a61d4e'; // Facebook App Secret
$redirectURL = 'http://localhost/librarysystem/'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>
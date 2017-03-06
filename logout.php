<?php
$mode = $_REQUEST["mode"];

if($mode == "fb") {
	//Include FB config file
	require_once 'fbConfig.php';

	//Unset user data from session
	unset($_SESSION['userData']);

	//Destroy session data
	$facebook->destroySession();

	//Redirect to homepage
	header("Location:index.php");
} else if($mode== "google") {

	//Include GP config file
	include_once 'gpConfig.php';

	//Unset token and user data from session
	unset($_SESSION['token']);
	unset($_SESSION['userData']);

	//Reset OAuth access token
	$gClient->revokeToken();

	//Destroy entire session
	session_destroy();

	//Redirect to homepage
	header("Location:index.php");
}

?>
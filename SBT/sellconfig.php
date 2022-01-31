<?php
	require_once "GoogleAPI/vendor/autoload.php";
	$gclient = new Google_Client();
	$gclient->setClientId("478607458960-vuv6hhhb481545dtr5h468kdoh71o88c.apps.googleusercontent.com");
	$gclient->setClientSecret("zcBDl7hI88ZnsezQ-bFSgYGq");
	$gclient->setApplicationName("sellsignin");
	$gclient->setRedirectUri("http://localhost//SBT/sellsign.php");
	// $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
	$gclient->addscope('email');
	$gclient->addscope('profile');
    // session_start();
?>

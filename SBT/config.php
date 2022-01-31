<?php
	require_once "GoogleAPI/vendor/autoload.php";
	$gclient = new Google_Client();
	$gclient->setClientId("153157964789-mrp20gjjmqjf7gvhu3sodtfhk88csjes.apps.googleusercontent.com");
	$gclient->setClientSecret("ugRYvQzLzQwpyiNt3PpJM0H-");
	$gclient->setApplicationName("sajhalogin");
	$gclient->setRedirectUri("https://simaldecor.com");
	// $gclient->setRedirectUri("http://localhost//SBT/buysignin.php");
	// $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
	$gclient->addscope('email');
	$gclient->addscope('profile');
    // session_start();
?>

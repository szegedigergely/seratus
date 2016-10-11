<?php
	include ('func_captcha.php');

	if(isset($_GET['size'])) {
		$w = $_GET['size'];
		$h = 0.5*$w;
	} else {
		$w = 100;
		$h = 50;
	}

	if(isset($_GET['index'])) {
		$i = $_GET['index'];
	} else {
		$i = 0;
	}

//Start the session so we can store what the security code actually is
	session_start();

//Send a generated image to the browser
	create_captcha_image($w,$h,$i);
	exit();
?>
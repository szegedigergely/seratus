<?php
	// $id = /*(isset($_GET['id']) && !empty($_GET['id']))?*/$_GET['id']/*:'fooldal'*/;
	$ping = 'pong';	
	require_once 'functions.php';

	$valid_lang = array('hu', 'en', 'de');

	$lang = in_array($_GET['lang'], $valid_lang)?$_GET['lang']:'hu';
	$id = preg_match('/^[A-Za-z0-9_]+$/', $_GET['id'])?$_GET['id']:'fooldal';

	$file = "content_".$lang."/content_".$id.".php";

	if(is_file($file)){
		// $content = file_get_contents($file);

		// echo $content;

		include_once $file;
	} else {
		echo 'redirect';
	}
	// echo $_GET['id'];
	// var_dump($_GET);
?>

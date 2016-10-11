<?php
	// $id = /*(isset($_GET['id']) && !empty($_GET['id']))?*/$_GET['id']/*:'fooldal'*/;
	$ping = 'pong';	
	require_once 'functions.php';

	$valid_lang = array('hu', 'en', 'de');

	$lang = in_array($_GET['lang'], $valid_lang)?$_GET['lang']:'hu';
	$id = preg_match('/^[A-Za-z0-9_]+$/', $_GET['id'])?$_GET['id']:'fooldal';

	$file = "content_".$lang."/content_".$id.".php";


	$ip = (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
	$logfile = '../ip.log';
	if(filesize($logfile) > 250000){
		rename($logfile,'../ip_'.date('Ymd').'.log');
	}

	$iplog = fopen($logfile, 'a');
	fwrite($iplog, '"'.date('Y.m.d H:i:s').'";"'.$ip.'";"'.$lang.'";"'.$id.'";"'.$_SERVER['HTTP_USER_AGENT'].'";'."\r\n");
	fclose($iplog);


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

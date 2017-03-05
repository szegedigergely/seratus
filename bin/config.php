<?php

	if(!$ping) die();

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	date_default_timezone_set('Europe/Budapest');

	// define('BASE_URL', 'seratus.hu');

	$debug_mode = true;	// false: SERATUS-ra megy, true: gmail.com
	$bcc_mode = true;		// kapok-e másolatot, vagy sem
	$is_local = true;

	$languages = array(
		'hu' => 'http://'.($is_local?'local':'www').'.seratus.hu',
		'en' => 'http://en'.($is_local?'.local':'').'.seratus.hu'/*,
		'de' => 'http://de'.($is_local?'.local':'').'.seratus.hu'*/
	);

	// $lang_code_lesz = substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],BASE_URL));
	$lang_prefix = substr($_SERVER['HTTP_HOST'],0,2);

	switch ($lang_prefix) {
		case 'en':
			$lang_code = 'en';
			break;
		case 'de':
			$lang_code = 'de';
			break;
		default:
			$lang_code = 'hu';
			break;
	}


	ini_set('include_path', 'bin'.PATH_SEPARATOR.'bin/content_'.$lang_code);

    // $base = "http://local.seratus.hu";
	// $cookie_name = 'seratus_hu_lang';

	return;

?>

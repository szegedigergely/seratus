<?php
	// session_start();
	$ping = 'pong';

	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	date_default_timezone_set('Europe/Budapest');

	$whitelist = array(
	    '127.0.0.1',
	    '::1'
	);

	// if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	    // $base = "http://seratus.hu";
	    // $base = "http://seratus.hu/teszt";
	    $base = "http://local.seratus.hu";
	// } else {
		// $base = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	// }

	// $valid_lang = array('hu', 'en', 'de');
	$valid_lang = array('hu', 'en');
	// $valid_lang = array('hu');
	$cookie_name = 'seratus_hu_lang';




	// if(isset($_GET['lang'])){
	// 	if(in_array($_GET['lang'], $valid_lang)){
	// 		$lang_code = $_GET['lang'];
	// 	    setcookie($cookie_name, $lang_code, time() + (10 * 365 * 24 * 60 * 60), "/");
	// 	} else {
	// 		$base = dirname($base);

	// 		header('Location: '.$base.'/hu');
	// 	}
	// } else {
	// 	if(!isset($_COOKIE[$cookie_name])) {
	// 	    $lang_code = 'hu';
	// 	    setcookie($cookie_name, $lang_code, time() + (10 * 365 * 24 * 60 * 60), "/");
	// 	} else {
	// 	    $lang_code = $_COOKIE[$cookie_name];
	// 	}

	// 	header('Location: '.$base.'/'.$lang_code);
	// }
	$lang_code = 'hu';
	$carousel = true;

	ini_set('include_path', 'bin'.PATH_SEPARATOR.'bin/content_'.$lang_code);
	include_once 'functions.php';


	if(isset($_GET['page'])){
		$content = $_GET['page'];
		$carousel = false;
	} else {
		switch ($lang_code) {
			case 'en':
				$content = 'main';
				break;
			default:
				$content = 'fooldal';
				break;
		}
	}

	$page = 'content_'.$content.'.php';
	if(!stream_resolve_include_path($page)) header('Location: '.$base);



	$ip = (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
	$logfile = 'visitor_log/ip.log';
	if(file_exists($logfile)){
		if(filesize($logfile) > 250000) rename($logfile,'visitor_log/ip_'.date('Ymd').'.log');
	}

	$iplog = fopen($logfile, 'a');
	fwrite($iplog, '"'.date('Y.m.d H:i:s').'";"'.$ip.'";"'.(isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'N/A').'";"'.$_SERVER['REQUEST_URI'].'";"'.$_SERVER['HTTP_USER_AGENT'].'";'."\r\n");
	fclose($iplog);

	// $redirected = 0;

	// $lang = isset($_GET['lang'])?$_GET['lang']:'';
	// if (empty($lang) || !in_array($lang, array('hu','en'))) {
	// 	$lang = strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)) == 'hu' ? 'hu' : 'en';
	// }
	// require_once('bin/lang_'.$lang.'.php');
	
	header('X-UA-Compatible: IE=edge,chrome=1');

?>
<!DOCTYPE html>
<html lang="<?=$lang_code?>">
	<head>
		<?php
			include 'html_head.php';
		?>

		<script type="text/javascript">
			var lang_code = '<?=$lang_code?>';
		</script>
	</head>
	<!-- <?php echo $base ?> -->
<body class="" data-content="<?=$content?>">
	<div id="preloader">
		<!--div id="status">
		</div-->
	</div>
	<nav>
	<?php
		include 'html_nav.php';

		if(count($valid_lang) > 1){
	?>
		<div class="languages">
	<?php
		$i = 0;
		foreach ($valid_lang as $lng) {
			// $base_new_lang = explode('/', $base);
			// $base_new_lang[count($base_new_lang)-1] = $lng;
			// $base_new_lang = implode('/', $base_new_lang);
			$base_new_lang = $base.'/'.$lng;

			echo '<a '.($lng==$lang_code?'class="active" ':'').'href="'.($lng==$lang_code?'/':$base_new_lang).'">'.$lng.'</a>
';
			$i++;
		}
	?>
		</div>
	<?php
		}
	?>
	</nav>
	<div id="carousel_wrapper">
		<?php
			if($carousel) include 'html_carousel.php';
		?>
	</div>
	<div id="content_wrapper">
		<div id="column_wrapper">
			<div class="column left">
			<?php
				include $page;
			?>
			</div>
			<div class="column right">
			<?php
				include 'html_right.php';
			?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php
		include 'html_footer.php';
	?>
	<div id="ajax">
		<!--div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div>
		<div class="square"></div-->
	</div>
	<div id="feedback" class=""></div>
	<div id="overlay"></div>
	<div id="overlay_close">&times;</div>

	<script type="text/javascript">
		// function getHash(){
		// 	hash = window.location.hash;
		// }

		$(window).load(function() {
			// if (!window.location.hash){
			// 	window.location.hash = '_';
			// } else if(window.location.hash != '_'){
			// 	$('body').removeClass('main');
			// }
			// getHash();

			// if(hash != '#_') $('body').removeClass('main');

			pageLoaded();

			// $("#status").fadeOut(50,function(){
				$("#preloader").fadeOut(500,function(){
				});	
			// });
		})
	</script>

	<?php
		include 'html_js.php';
	?>
</body>
</html>

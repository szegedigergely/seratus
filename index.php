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

	$valid_lang = array('hu', 'en');
	$cookie_name = 'seratus_hu_lang';


	$lang_code = 'hu';
	// $lang_code = 'en';

	$carousel = true;
	$content_html = '';

	ini_set('include_path', 'bin'.PATH_SEPARATOR.'bin/content_'.$lang_code);
	include_once 'functions.php';

	if(isset($_GET['page'])){
		$content_name = $_GET['page'];
		$carousel = false;
	} else {
		switch ($lang_code) {
			case 'en':
				$content_name = 'main';
				break;
			default:
				$content_name = 'fooldal';
				break;
		}
	}

	$page = 'content_'.$content_name.'.php';
	$page_path = stream_resolve_include_path($page);
	if(!$page_path){
		header('Location: '.$base);
	} else {
		include($page_path);
	}

	$ip = (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
	$logfile = 'visitor_log/ip.log';
	if(file_exists($logfile)){
		if(filesize($logfile) > 250000) rename($logfile,'visitor_log/ip_'.date('Ymd').'.log');
	}

	$iplog = fopen($logfile, 'a');
	fwrite($iplog, '"'.date('Y.m.d H:i:s').'";"'.$ip.'";"'.(isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'N/A').'";"'.$_SERVER['REQUEST_URI'].'";"'.$_SERVER['HTTP_USER_AGENT'].'";'."\r\n");
	fclose($iplog);

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
<body class="" data-content="<?=$content_name?>">
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
		foreach ($valid_lang as $lang) {
			if($lang == 'hu'){
	?>
			<a <?php echo ($lang==$lang_code)?'class="active" ':''?>href="http://www.seratus.hu/"><?=$lang?></a>
	<?php
			} else {
	?>
			<a <?php echo ($lang==$lang_code)?'class="active" ':''?>href="http://<?=$lang?>.seratus.hu/"><?=$lang?></a>
	<?php
			}
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
				echo $content_html;

				if(isset($recommend_array)) recommend($recommend_array);
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
	<div id="feedback" class=""></div>
	<div id="overlay"></div>
	<div id="overlay_close">&times;</div>

	<script type="text/javascript">
		$(window).load(function() {
			pageLoaded();

			$("#preloader").fadeOut(500,function(){
			});	
		})
	</script>

	<?php
		include 'html_js.php';
	?>
</body>
</html>

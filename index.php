<?php
	// session_start();
	$ping = 'pong';

	include_once 'bin/config.php';

	include_once 'functions.php';

	$carousel = true;
	$content_html = '';

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
		header('Location: '.$languages[$lang_code].'/error-404');
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
		<?=$lang_code_lesz?>
		</div-->
	</div>
	<nav>
	<?php
		include 'html_nav.php';

		if(count($languages) > 1){
	?>
		<div class="languages">
	<?php
		foreach ($languages as $lang => $lang_url) {
	?>
			<a <?php echo ($lang==$lang_code)?'class="active" ':''?>href="<?=$lang_url?>"><?=$lang?></a>
	<?php
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
	<div id="content_wrapper" class="lang_<?=$lang_code?>">
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

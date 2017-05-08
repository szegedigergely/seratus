<?php
	if(!$ping) die;
?>
		<base href="<?=BASE_URL?>" />

		<meta property="og:title"       content="Seratus" /> 
		<meta property="og:type"        content="website" /> 
		<meta property="og:url"         content="<?=BASE_URL?>" /> 
		<meta property="og:image"       content="<?=BASE_URL?>images/fb_logo.png" /> 
		<meta property="og:description" content="Seratus Ingatlan Tanácsadó Igazságügyi Szakértő Kft." /> 	

		<title><?=$title?><?=$title?' - ':''?>Seratus - Minden, ami ingatlan</title>

<?php
		if(count($languages) > 1){
			foreach ($languages as $lang => $lang_url) {
				if($lang != $lang_code){
?>
		<link rel="alternate" hreflang="<?=$lang?>" href="<?=$lang_url?>" />
<?php
				}
			}
		}
?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="author" content="Kolorart.hu - 2017 - Minden jog fenntartva" />
		<meta name="description" content="Seratus Ingatlan Tanácsadó Igazságügyi Szakértő Kft." />

		<meta name="viewport" content="user-scalable=no">

		<link href="favicon.png" rel="shortcut icon" type="image/png" />
		<link rel="stylesheet" type="text/css" href="./css/swiper.min.css?v=<?php echo microtime(true); ?>" />
		<link rel="stylesheet" type="text/css" href="./css/common.css?v=<?php echo microtime(true) ?>" />

		<script type="text/javascript" src="./js/jquery.min.js"></script>

		<style>
			html {
				display: block;
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
			}

			body {
				display: block;
				margin: 0;
				padding: 0;
/*				width: 100%;
				height: 100%;*/
			}

			body.preload {
				width: 100%;
				height: 100%;
			}

			#preloader {
				display: block;
				width: 100%;
				height: 100%;
				position: fixed;
				top: 0;
				left: 0;
				background-color: rgb(230,230,230);
				z-index: 999999;
				-webkit-transform: translateZ(0.01);
			}
			
			#status {
				display: block;
				margin: -10em -10em 0 0;
				width: 20em;
				height: 20em;
				position: absolute;
				right: 50%;
				top: 50%;
			}

			#status .logo_anim {
				display: block;
				width: 100%;
				height: 100%;
				position: absolute;
				left: 0%;
				top: 0%;
				overflow: hidden;
			}

			#status img {
				display: block;
				width: 100%;
				height: auto;
				position: absolute;
				left: 0%;
				top: 0%;
			}

		</style>

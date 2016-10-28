<?php
	if(!$ping) die;
?>
		<meta property="og:title"       content="Seratus" /> 
		<meta property="og:type"        content="website" /> 
		<meta property="og:url"         content="<?=$base?>" /> 
		<meta property="og:image"       content="<?=$base?>/images/fb_logo.png" /> 
		<meta property="og:description" content="Seratus Ingatlan Tanácsadó Igazságügyi Szakértő Kft." /> 	

		<title>Seratus - Minden, ami ingatlan</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="author" content="Kolorart.hu - 2016 - Minden jog fenntartva" />
		<meta name="description" content="Seratus Ingatlan Tanácsadó Igazságügyi Szakértő Kft." />

		<meta name="viewport" content="user-scalable=no">

		<link href="favicon.png" rel="shortcut icon" type="image/png" />
		<link rel="stylesheet" type="text/css" href="css/swiper.min.css?v=<?php echo microtime(); ?>" />
		<link rel="stylesheet" type="text/css" href="css/common.css?v=<?php echo microtime() ?>" />

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!--link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'-->

		<!--script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script-->

		<!--script>
			(function(doc) {
				// var viewport = document.getElementById('viewport');
				var pixelRatio = window.devicePixelRatio;

				if ( pixelRatio > 1 ) {
					var viewportmeta = document.querySelector('meta[name="viewport"]');
					if (viewportmeta) {
				 	   viewportmeta.setAttribute("content", "initial-scale="+(1/pixelRatio)+", maximum-scale=1.0, user-scalable=no");
				 	   document.body.addEventListener('gesturestart', function() { viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6, user-scalable=no'; }, false);
					}
				}
			}(document));
		</script-->

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

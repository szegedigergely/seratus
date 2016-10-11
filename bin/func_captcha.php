<?php

// kép teljes invertálása
	function invert_image($input,$output,$color=false,$type='jpeg')
	{
//		if($type == 'jpeg') $bild = imagecreatefromjpeg($input);
//		else $bild = imagecreatefrompng($input);
		$bild = $input;

		$x = imagesx($bild);
		$y = imagesy($bild);

		for($i=0; $i<$y; $i++)
		{
			for($j=0; $j<$x; $j++)
			{
				$pos = imagecolorat($bild, $j, $i);
				$f = imagecolorsforindex($bild, $pos);
				if($color == true)
				{
					$col = imagecolorresolve($bild, 255-$f['red'], 255-$f['green'], 255-$f['blue']);
				}else{
					$gst = $f['red']*0.15 + $f['green']*0.5 + $f['blue']*0.35;
					$col = imagecolorclosesthwb($bild, 255-$gst, 255-$gst, 255-$gst);
				}
				imagesetpixel($bild, $j, $i, $col);
			}
		}
		if(empty($output)) header('Content-type: image/'.$type);
		if($type == 'jpeg') imagejpeg($bild,$output,90);
		else imagepng($bild,$output);
	}

// kép színeinek invertálása egy maszk szerint (maszk fehér: invertálás)
	function invert_by_mask(&$img,$msk)
	{
		$black = imagecolorat($msk,1,1);
//		$pos = imagecolorat($msk,1,1);
//		$o_pos = imagecolorat($img,1,1);

		$x = imagesx($msk);
		$y = imagesy($msk);
//		echo $x,'px * ',$y,'px - ',"\n"/*,$black,' ',$pos,' ',$o_pos*/;


		for($j=0; $j<$y; $j++) {
			for($i=0; $i<$x; $i++) {
				$pos = imagecolorat($msk,$i,$j);
				if($pos != $black) {
//					echo '.';
					$o_pos = imagecolorat($img,$i,$j);
					$inv_val = imagecolorsforindex($msk, $pos);
					$inv_col = imagecolorsforindex($img, $o_pos);
					$col = round($inv_col['red']*(1-$inv_val['red']/255)+(255-$inv_col['red'])*($inv_val['red']/255));
					$new_col = imagecolorexact($img, $col, $col, $col);
					if ($new_col == -1) {
						$new_col = imagecolorallocate($img,$col,$col,$col);
					}
//					echo $inv_val,' ',$inv_col,' ',$col,' ',$new_col,"\n";
					imagesetpixel($img,$i,$j,$new_col);
//					imagecolordeallocate($img,$new_col);
				}
			}
		}
	}


// captcha kép generálása
	function create_captcha_image($width,$height,$index)
	{

		$tmp_str=str_shuffle('ABCDEFGHJKLNPQRSTUVXYZ23456789');
		$security_code=substr($tmp_str,rand(0,10),4);
		$_SESSION['code'][$index] = $security_code;
		$res_code = str_split($security_code);

		$main_mask = ImageCreate($width, $height);
		$char_mask = ImageCreate($width, $height);

		$background_color = ImageColorAllocate($main_mask, 255, 255, 255);

		$m_white = ImageColorAllocate($char_mask, 255, 255, 255);
		$m_black = ImageColorAllocate($char_mask, 0, 0, 0);

		ImageFill($main_mask, 0, 0, $background_color);

		$i = 0;
		foreach($res_code as $rc) {
			ImageFilledrectangle($char_mask, 0, 0, $width, $height, $m_black);
//			$size = round($height*0.76 + rand(-0.016*$height,0.016*$height));
			$size = round(($width*0.8 + rand(-0.02*$width,0.02*$width))*0.4);
//			$x_offset = round(0.04*$width + $i*$size*0.7);
			$x_offset = round(0.075*$width + $i*$size*0.6);
			$y_offset = round(0.7*$height + rand(-0.025*$height,0.025*$height));
			$rot = rand(-6,6);
			imagettftext($char_mask, $size, $rot, $x_offset, $y_offset, $m_white, '../fonts/arial_black.ttf', $rc);
//			if ($rc == '0') imagettftext($char_mask, round(1.1*$size), $rot, $x_offset+round(0.12*$size), $y_offset-round(0.045*$size), $m_white, '../fonts/arial_black.ttf', '-');
			if ($rc == '0') imagettftext($char_mask, round(0.5*$size), $rot, $x_offset+round(0.25*$size), $y_offset-round(0.25*$size), $m_white, '../fonts/arial_black.ttf', '/');
			invert_by_mask($main_mask,$char_mask);
			$i++;
		}
		
		$final = ImageCreate($width, $height);
		
		for($j=0; $j<$height; $j++) {
			for($i=0; $i<$width; $i++) {
				$pos = imagecolorat($main_mask,$i,$j);

				$mask_val = imagecolorsforindex($main_mask, $pos);

				$alpha = floor($mask_val['red']/2);
				
				$new_col = imagecolorexactalpha($final,8,156,203,$alpha);
				if ($new_col == -1) {
					$new_col = imagecolorallocatealpha($final,8,156,203,$alpha);
				}
				imagesetpixel($final,$i,$j,$new_col);

			}
		}


		header('Content-type: image/png');
		imagepng($final);

		ImageDestroy($main_mask);
		ImageDestroy($char_mask);
		ImageDestroy($final);
	}


return;

?>

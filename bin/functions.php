<?php

	if(!$ping) die();

    // Message design (headers and rows)
    $msg_header_1 = "align=\"left\" valign=\"top\" style=\"padding:10px 15px;background-color:#eeeeee;color:#777777;font-weight:bold;\"";
    $msg_header_2 = "align=\"left\" valign=\"top\" style=\"padding:10px 15px;border-bottom:1px solid #eeeeee;font-style:italic;color:#333;\"";
    $msg_row_1 = "align=\"left\" valign=\"top\" style=\"padding:10px 15px;border-bottom:1px solid #eeeeee;\"";
    $msg_row_2 = "align=\"left\" valign=\"top\" style=\"padding:10px 15px;\"";

    // Create table (headers and rows)
    function msg_create_row ($msg_design,$msg_label,$msg_data) {

        ob_start();
        ?>
        <tr>
            <td <?=$msg_design?>>
                <b><?=$msg_label?></b>
            </td>
            <td width="300" <?=$msg_design?>>
                <?=$msg_data?>
            </td>
        </tr>
        <?php
        $msg_row = ob_get_contents();
        ob_end_clean();
        return $msg_row;
    }

    // Create table (headers and rows)
    function msg_create_merged_row ($msg_design,$msg_text) {

        ob_start();
        ?>
        <tr>
            <td <?=$msg_design?> colspan="2">
                <?=$msg_text?>
            </td>
        </tr>
        <?php
        $msg_row = ob_get_contents();
        ob_end_clean();
        return $msg_row;
    }

	function recommend($array){
		// echo 'works!';
		global $lang_code;
		// var_dump($lang_code);

		$erdekelhetik = array(
			'hu' => 'Alábbi szolgáltatásaink is érdekelhetik:',
			'en' => 'Our following services may also be of interest to you:',
			'de' => 'Alábbi szolgáltatásaink is érdekelhetik (GER):',
		);


		if(is_array($array)){
?>
<hr class="recommend_more" />
<h3 class="recommend_head"><?=$erdekelhetik[$lang_code]?></h3>
<?php
			foreach($array as $a){
				$file = "bin/content_".$lang_code."/recommend_".$a.".php";
				// $file = "recommend_".$a.".php";

				if(is_file($file)){
					$content = file_get_contents($file);
?>
<div class="recommend">
<?php
					echo $content;
?>
</div>
<?php
				}
			}
		}
	}

/********************************************************************************************************************/

// e-mail validálás
	function validEmail($email)
	{
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex){
			$isValid = false;
		} else{
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64){
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255)
			{
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.')
			{
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local))
			{
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
			{
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain))
			{
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
			{
				// character not valid in local part unless
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/',
					str_replace("\\\\","",$local)))
				{
				$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
			{
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}

/********************************************************************************************************************/

	// IP lekérés
	function getIpAddress() {
		return (empty($_SERVER['HTTP_CLIENT_IP'])?(empty($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['REMOTE_ADDR']:$_SERVER['HTTP_X_FORWARDED_FOR']):$_SERVER['HTTP_CLIENT_IP']);
	}

/********************************************************************************************************************/

	return;

?>

<?php

	$ping = 'pong';

	require_once 'functions.php';
	require_once 'class.phpmailer.php';

	// - - - - -

	$form_ok = true;
	// $post = [];

	foreach ($_POST as $key => $value) {
		if(trim($value) != ''){
			$post[$key] = strip_tags(trim($value));
		} else {
			$form_ok = false;
		}
	}

	if($form_ok){
		$email_valid = validEmail($post['email']);
		if($email_valid){

			$subscribers = 'subscribers.csv';

			// $earlier = array_map('str_getcsv', file($subscribers));

			$csv = fopen($subscribers, 'a');
			fwrite($csv, '"'.$post['name'].'";"'.$post['email'].'";'."\r\n");
			fclose($csv);


			// Data - ContentTable
			$data_table = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody>";

			// Személyes adatok
			$data_table .= msg_create_row( $msg_header_1, "Feliratkozó adatai", "&nbsp;" );
			$data_table .= msg_create_row( $msg_row_1, "Név", $post['name'] );
			$data_table .= msg_create_row( $msg_row_1, "E-mail", $post['email'] );

			// Kérdés
			$data_table .= msg_create_row( $msg_header_1, "Megjegyzés", "&nbsp;" );
			$data_table .= msg_create_merged_row( $msg_row_1, "A korábbi feliratkozók adatai elérhetők CSV formátumban <a href=\"http://grtest.hu/work/gery/s/bin/subscribers.csv\">ezen a linken</a>." );


			$data_table .= "</tbody></table>";
			// Data - ContentTable

			// - - - - -


			// E-mail - Background
			$mail_header = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;margin:0;padding:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:100%;background:#eeeeee\" align=\"center\"><tbody><tr><td align=\"center\">";

				// E-mail - Logo-Container
				$mail_header .= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:700px;\" align=\"center\"><tbody><tr><td style=\"padding:15px 15px 15px 15px\" align=\"left\">";
				$mail_header .= "<a href=\"\" target=\"_blank\" style=\"display:inline-block;border:none;\"><img src=\"\" alt=\"\" style=\"padding:5px 10px 0px 10px;\"/></a>";
				$mail_header .= "</td></tr></tbody></table>";
				// E-mail - / Logo-Container

				// E-mail - White-Container
				$mail_header .= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:700px;background:#ffffff;border-radius:5px;\" align=\"center\"><tbody><tr><td style=\"padding:10px 10px 10px 10px;\" align=\"center\">";

					// E-mail - ContentText-Container
					$mail_content = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody><tr><td style=\"padding:15px 0 10px 0;line-height:18px;text-align:justify\" align=\"justify\">";

					$mail_content .= "Feliratkozási kérelem érkezett karrier témában:";

					$mail_content .= "</td></tr></tbody></table>";

					$mail_content .= $data_table;

					$mail_content .= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody><tr><td style=\"padding:15px 0 20px 0;line-height:18px;text-align:justify\" align=\"justify\">";

					$mail_content .= "</td></tr></tbody></table>";
					// E-mail - / ContentText-Container

				$mail_footer = "</td></tr></tbody></table>";
				// E-mail - / White-Container

				// E-mail - Bottom-Container
				$mail_footer .= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:700px;\" align=\"center\"><tbody><tr><td style=\"padding:15px 15px 25px 15px;color:#aaaaaa;font-size:12px;font-style:italic;\" align=\"left\">";
				$mail_footer .= "Seratus.hu";
				$mail_footer .= "</td></tr></tbody></table>";
				// E-mail -/ Bottom-Container

			$mail_footer .= "</td></tr></tbody></table>";
			// E-mail - / Background

			// - - - - -

			// Basic informations

			$sender_email = $post['email'];
			$sender_name = $post['name'];
			$subject = 'Feliratkozási kérelem érkezett karrier témában';
			$address = 'ajanlat@greenroom.hu';
			// $address = 'info@seratus.hu';
			$bcc_recipients = array(
			   // 'szegedi.gergely@gmail.com' => 'Szegedi Gergely',
			);

			// Set the e-mail
			$mail = new PHPMailer();
			$mail->IsHTML(true);
			$mail->CharSet = "utf-8";
			$mail->SetFrom($sender_email, $sender_name);
			$mail->AddAddress($address);
			foreach($bcc_recipients as $bcc_email => $bcc_name) { $mail->AddBCC($bcc_email, $bcc_name); }
			$mail->Subject = $subject;
			// $mail->AddEmbeddedImage(JPATH_BASE .DS.'templates'.DS.'custom'.DS.'images'.DS.'mol_hu'.DS.'mol_logo_hu.png', '10001', 'mol_logo_hu.png');
			$mail->MsgHTML($mail_header.$mail_content.$mail_footer);

			// Send the e-mail (success or not)
			if (!$mail->Send()) {
				$data = 'email_not_sent';
			} else {
				$data = 'mail_sent';
			}
		} else {
	        $data = 'invalid_email';
	    }
    } else { // if form not ok
        $data = 'form_not_filled';
	}

	// echo json_encode($data);
	echo $data;

?>


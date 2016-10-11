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
            $post['message'] = str_replace("\n", "<br>", $post['message']);

			// - - - - -

			// Basic informations

			$sender_email = $post['email'];
			$sender_name = $post['name'];
			// $subject = 'Kérdés érkezett "'.$_POST['subject'].'" témában';
			$subject = 'Kérdés érkezett';
			$address_name = $post['recipient_name'];

            if(!$debug_mode){
				$address = $post['recipient'];
            } else {
                $address = 'szegedi.gergely@gmail.com';
            }



            if(!$bcc_mode){
	            $bcc_recipients = array();
                // $bcc_recipients = array(
                //     $sender_email => $sender_name
                // );
            } else {
                $bcc_recipients = array(
                    // $sender_email => $sender_name,
                    'szegedy.gergely@gmail.com' => 'Szegedi Gergely'
                );
            }


			// Data - ContentTable
			$data_table = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody>";

			// Személyes adatok
			$data_table .= msg_create_row( $msg_header_1, "Érdeklődő adatai", "&nbsp;" );
			$data_table .= msg_create_row( $msg_row_1, "Név", $post['name'] );
			$data_table .= msg_create_row( $msg_row_1, "E-mail", $post['email'] );
			// $data_table .= msg_create_row( $msg_row_1, "Témakör", $post['subject'] );
			$data_table .= msg_create_row( $msg_row_2, "&nbsp;", "&nbsp;" );

			// Kérdés
			$data_table .= msg_create_row( $msg_header_1, "Üzenet", "&nbsp;" );
			$data_table .= msg_create_merged_row( $msg_row_1, $post['message'] );
			$data_table .= msg_create_row( $msg_row_2, "&nbsp;", "&nbsp;" );


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

					$mail_content .= "Kedves ".$_POST['recipient_name']."!<br/><br/>Az alábbi kérdés érkezett az Ön részére:";

					$mail_content .= "</td></tr></tbody></table>";

					$mail_content .= $data_table;

					$mail_content .= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody><tr><td style=\"padding:15px 0 20px 0;line-height:18px;text-align:justify\" align=\"justify\">";

					$mail_content .= "</td></tr></tbody></table>";
					// E-mail - / ContentText-Container


					$mail_content_thankyou = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody><tr><td style=\"padding:15px 0 10px 0;line-height:18px;text-align:justify\" align=\"justify\">";

					$mail_content_thankyou .= "Tisztelt Érdeklődő!<br/><br/>Megtisztelő megkeresését kollégánk, ".$address_name." felé rendszerünkben rögzítettük, a részletek egyeztetése miatt munkatársunk hamarosan kapcsolatba lép Önnel a megadott elérhetőségeken.<br/><br/>Üdvözlettel:<br/>SERATUS Ingatlan Kft.";

					$mail_content_thankyou .= "</td></tr></tbody></table>";




				$mail_footer = "</td></tr></tbody></table>";
				// E-mail - / White-Container

				// E-mail - Bottom-Container
				$mail_footer .= "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:700px;\" align=\"center\"><tbody><tr><td style=\"padding:15px 15px 25px 15px;color:#aaaaaa;font-size:12px;font-style:italic;\" align=\"left\">";
				$mail_footer .= "Seratus.hu";
				$mail_footer .= "</td></tr></tbody></table>";
				// E-mail -/ Bottom-Container

			$mail_footer .= "</td></tr></tbody></table>";
			// E-mail - / Background



			// $address = "info@seratus.hu";
			// $address = "szegedi.gergely@gmail.com";
			// $bcc_recipients = array(
			// 	$sender_email => $sender_name,
			// 	'szegedi.gergely@gmail.com' => 'Szegedi Gergely'
			// );

			// Set the e-mail
			$mail = new PHPMailer();
			$mail->IsHTML(true);
			$mail->CharSet = "utf-8";
			// $mail->SetFrom($address, $address_name);
			$mail->SetFrom('kerdes-valasz@seratus.hu', 'SERATUS');
			$mail->AddAddress($address);
			foreach($bcc_recipients as $bcc_email => $bcc_name) { $mail->AddBCC($bcc_email, $bcc_name); }
			$mail->Subject = $subject;
			$mail->MsgHTML($mail_header.$mail_content.$mail_footer);

			// Send the e-mail (success or not)
			if (!$mail->Send()) {
				$data = 'email_not_sent';
			} else {
				$data = 'mail_sent';
			}


			$subject = "Köszönjük megkeresését!";

			// Set the e-mail
			$mail = new PHPMailer();
			$mail->IsHTML(true);
			$mail->CharSet = "utf-8";
			// $mail->SetFrom($address, $address_name);
			$mail->SetFrom('kerdes-valasz@seratus.hu', 'SERATUS');
			$mail->AddAddress($sender_email);
			foreach($bcc_recipients as $bcc_email => $bcc_name) { $mail->AddBCC($bcc_email, $bcc_name); }
			$mail->Subject = $subject;
			$mail->MsgHTML($mail_header.$mail_content_thankyou.$mail_footer);

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


<?php

    $ping = 'pong';

	require_once 'functions.php';
	require_once 'class.phpmailer.php';

    session_start();
	// - - - - -

	$form_ok = true;

    $subjects = array(
        'fs_ertekbecsles' => 'Értékbecslés',
        'fs_muszaki_szakertes' => 'Műszaki szakértés',
        'fs_igazsagugyi_szakertes' => 'Igazságügyi szakértés',
        'fs_energetikai_vizsgalat' => 'Energetikai vizsgálat',
        'fs_ingatlan_ertekesites' => 'Ingatlan értékesítés',
        'fs_ingatlannyilvantartasi_ugyintezes' => 'Ingatlannyilvántartási ügyintézés',
        'fs_projektellenorzes' => 'Projektellenőrzés'
    );

    $keyNames = array(
        'name' => "Név",
        'delegate' => "Képviselő (vállalkozás esetén)",
        'tax_num' => "Adószám (vállalkozás esetén)",
        'invoice_address' => "Számlázási cím",
        'address' => "Levelezési cím",
        'phone' => "Telefon",
        'fax' => "Fax", 
        'email' => "E-mail", 
        'realty_title_1' => "<br/>1. ingatlan", 
        'realty_title_2' => "<br/>2. ingatlan", 
        'realty_title_3' => "<br/>3. ingatlan", 
        'realty_title_4' => "<br/>4. ingatlan", 
        'realty_type_1' => "Jellege", 
        'realty_type_2' => "Jellege", 
        'realty_type_3' => "Jellege", 
        'realty_type_4' => "Jellege", 
        'realty_address_1' => "Címe", 
        'realty_address_2' => "Címe", 
        'realty_address_3' => "Címe", 
        'realty_address_4' => "Címe", 
        'realty_share_1' => "Értékelendő tulajdoni hányad", 
        'realty_share_2' => "Értékelendő tulajdoni hányad", 
        'realty_share_3' => "Értékelendő tulajdoni hányad", 
        'realty_share_4' => "Értékelendő tulajdoni hányad", 
        'realty_hrsz_1' => "Helyrajzi szám", 
        'realty_hrsz_2' => "Helyrajzi szám", 
        'realty_hrsz_3' => "Helyrajzi szám", 
        'realty_hrsz_4' => "Helyrajzi szám", 
        'realty_area_1' => "Telek területe (m<sup>2</sup>)", 
        'realty_area_2' => "Telek területe (m<sup>2</sup>)", 
        'realty_area_3' => "Telek területe (m<sup>2</sup>)", 
        'realty_area_4' => "Telek területe (m<sup>2</sup>)", 
        'realty_gross_1' => "Felépítmények bruttó alapterület", 
        'realty_gross_2' => "Felépítmények bruttó alapterület", 
        'realty_gross_3' => "Felépítmények bruttó alapterület", 
        'realty_gross_4' => "Felépítmények bruttó alapterület", 
        'realty_num_1' => "Felépítmények száma", 
        'realty_num_2' => "Felépítmények száma", 
        'realty_num_3' => "Felépítmények száma", 
        'realty_num_4' => "Felépítmények száma", 
        'realty_prev_b_1' => "Van meglévő értékbecslés", 
        'realty_prev_b_2' => "Van meglévő értékbecslés", 
        'realty_prev_b_3' => "Van meglévő értékbecslés", 
        'realty_prev_b_4' => "Van meglévő értékbecslés", 
        'realty_maker_1' => "Készítő társaság", 
        'realty_maker_2' => "Készítő társaság", 
        'realty_maker_3' => "Készítő társaság", 
        'realty_maker_4' => "Készítő társaság", 
        'realty_date_1' => "Értékbecslés dátuma", 
        'realty_date_2' => "Értékbecslés dátuma", 
        'realty_date_3' => "Értékbecslés dátuma", 
        'realty_date_4' => "Értékbecslés dátuma", 
        'realty_bank_1' => "Mely pénzintézet részére készült", 
        'realty_bank_2' => "Mely pénzintézet részére készült", 
        'realty_bank_3' => "Mely pénzintézet részére készült", 
        'realty_bank_4' => "Mely pénzintézet részére készült", 
        'est_goal' => "Értékbecslés célja", 
        'est_goal_other' => "Egyéb cél részletezése", 
        'est_bank' => "Hitelfedezet esetén bank megjelölése", 
        'bank_other_name' => "Egyéb bank megnevezése", 
        'bank_manager_name' => "Banki ügyfélmenedzser neve", 
        'bank_manager_phone' => "Banki ügyfélmenedzser telefonszáma", 
        'exp_goal' => "Szakvélemény célja", 
        'exp_goal_other' => "Egyéb cél részletezése", 
        'advocate_name' => "Jogi képviselő neve", 
        'advocate_phone' => "Jogi képviselő telefonszáma", 
        'rating_goal' => "Értékelés célja", 
        'rating_goal_other' => "Egyéb cél részletezése", 
        'admin_goal' => "Az ügyintézés célja", 
        'admin_goal_other' => "Egyéb cél részletezése", 
        'financing_bank' => "Finanszírozó bank"
    );

    if(strtolower($_POST['captcha']) === strtolower($_SESSION['code']['online'])){
    	if($form_ok){
            $email_valid = validEmail($_POST['email']);
            if($email_valid){

        		// Data - ContentTable
        		$data_table = "<table cellpadding=\"0\" cellspacing=\"0\" style=\"border:0 none;border-spacing:0;font-family:Helvetica,Arial,sans-serif;color:#000000;font-size:14px;width:600px\" width=\"600\" align=\"center\"><tbody>";

        		// Személyes adatok
                $firstField = true;

                foreach ($_POST as $key => $value) {
                    if(strpos($key, 'fieldset') === 0){
                        if(!$firstField){
                    		$data_table .= msg_create_row( $msg_row_2, "&nbsp;", "&nbsp;" );
                        } else {
                            $firstField = false;
                        }
                        $data_table .= msg_create_row( $msg_header_1, $value, "&nbsp;" );
                    } else {
                        if(array_key_exists($key, $keyNames)){
                            $data_table .= msg_create_row( $msg_row_1, $keyNames[$key], $value );
                        }
                    }
                }

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

        				$mail_content .= "Alábbi küldőtől online megbízás érkezett:";

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


                $sender_email = $_POST['email'];
                $sender_name = $_POST['name'];
                $subject = 'Online megbízás - '.$subjects[$_POST['szolgaltatas']];
                $address_name = 'SERATUS';

                if(!$debug_mode){
                    $address = 'ajanlat@seratus.hu';
                } else {
                    // $address = 'szegedi.gergely@gmail.com';
                    $address = 'ajanlat.seratus.hu@gmail.com';
                }

                if(!$bcc_mode){
                    $bcc_recipients = array(
                        $sender_email => $sender_name
                    );
                } else {
                    $bcc_recipients = array(
                        $sender_email => $sender_name,
                        'szegedy.gergely@gmail.com' => 'Szegedi Gergely'
                    );
                }

        		// Set the e-mail
        		$mail = new PHPMailer();
        		$mail->IsHTML(true);
        		$mail->CharSet = "utf-8";
        		$mail->SetFrom($address, $address_name);
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
    } else { // wrong captcha given
        $data = 'captcha_invalid';
        // $data = 'captcha_invalid (expected: '.$_SESSION['code'][0].', given: '.$_POST['captcha'].')';
    }

	// echo json_encode($data);
	echo $data;

?>

<?php
	if(!$ping) die;
?>
		<div class="right_box box_top_edge">
		</div>
		<div class="right_box box_utils">
			<a href="#online_assignment" class="right_button online"><span class="icon"><img src="images/button_icons.png" alt="" /></span><span class="text">Online assignment</span></a>
			<div class="right_button faq"><span class="icon"><img src="images/button_icons.png" alt="" /></span><span class="text">Question-answer</span></div>
			<form id="faq_form" name="send" method="post" action="bin/func_sendFAQ.php">
				<p class="faq_form_element">Don’t hesitate to ask about any real estate-related topic. Our colleague will respond to you by Email <span>within 24 hours</span>!</p>
				<label class="faq_form_element form_name">
					<span>Name:</span>
					<input type="text" name="name"/>
				</label>
				<input id="recipient" type="hidden" name="recipient" value="info@seratus.hu" data-default="ajanlat@seratus.hu" />
				<input id="recipient_name" type="hidden" name="recipient_name" value="SERATUS" data-default="SERATUS" />
				<!--label class="faq_form_element form_subject">
					<span>Témakör:</span>
					<select name="subject">
						<option value="1">Témakör 1</option>
						<option value="2">Témakör 2</option>
						<option value="3">Témakör 3</option>
						<option value="4">Témakör 4</option>
	  				</select>
				</label-->
				<label class="faq_form_element form_message">
					<span>Question:</span>
					<textarea name="message"></textarea>
				</label>
				<label class="faq_form_element form_email">
					<span>E-mail address:</span>
					<input type="text" name="email"/>
				</label>
				<label class="faq_form_element send">
					<!-- <input class="form_send button w_arrow" type="submit" value="Elküld" /> -->
					<div class="button w_arrow"><span>Send</span><img class="arrow" src="images/button_arrow.png" alt="" /></div>
				</label>
			</form>
		</div>
		<div class="right_box box_mid_edge">
		</div>
		<div class="right_box box_map">
			<div class="contact_box phone"><span class="icon"><img src="images/contact_icons.png" alt="phone" /></span><span class="text">+36 1 267 4694<br/>+36 30 242 7494</span></div>
			<div class="contact_box mail"><span class="icon"><img src="images/contact_icons.png" alt="email" /></span><span class="text">ajanlat<i class="si si-naknek"></i>seratus<i class="si si-nalnel"></i>hu</span></div>
			<div class="contact_box address"><span class="icon"><img src="images/contact_icons.png" alt="address" /></span><span class="text">1095 Budapest<br/>Mester u. 54. I.em. 1.</span></div>
			<div class="contact_box map"><a href="https://www.google.hu/maps/place/Seratus+Ingatlan+Tan%C3%A1csad%C3%B3+Igazs%C3%A1g%C3%BCgyi+Kft./@47.478023,19.074725,19z/data=!3m1!4b1!4m2!3m1!1s0x4741dcfc2551b66d:0xd91d2d9e13d6f278?hl=hu" target=_blank title="Seratus a Google térképén"><img src="images/contact_map.jpg" alt="" /></a></div>
		</div>
		<div class="right_box box_bottom_edge">
		</div>

<?php

$title = 'Online assignment';

$content_html = 
'<h1>Online assignment</h1>
<p>Conduct your real estate affairs quickly and simply!<br/>Please provide the data required for the administration,<br/>so that our colleague can be prepared when calling you back!</p>
<form id="online_form" name="online_form" method="post" action="bin/func_sendOnline.php">
	<fieldset class="fs_null fs_ertekbecsles fs_muszaki_szakertes fs_igazsagugyi_szakertes fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<label>
			<span><strong>Requested service</strong></span>
			<select id="select_service" name="szolgaltatas">
				<option value="fs_null">choose a service</option>
				<option value="fs_ertekbecsles">appraisals</option>
				<option value="fs_muszaki_szakertes">technical expertise</option>
				<option value="fs_igazsagugyi_szakertes">forensic expertise</option>
				<option value="fs_energetikai_vizsgalat">energy audit</option>
				<option value="fs_ingatlan_ertekesites">sale of real estate</option>
				<option value="fs_ingatlannyilvantartasi_ugyintezes">cadastre administration</option>
				<option value="fs_projektellenorzes">project control</option>
			</select>
		</label>
	</fieldset>
	<br/>




	<fieldset class="fs_ertekbecsles fs_muszaki_szakertes fs_igazsagugyi_szakertes fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<input type="hidden" name="fieldset_1" value="Ajánlatkérő adatai" />
		<label class="field_title">
			<span><strong>Details of person requesting the quote</strong></span>
		</label>
		<label>
			<span>Name:</span>
			<input type="text" name="name" />
		</label>
		<label>
			<span>Representative (in case of a business):</span>
			<input type="text" name="delegate" />
		</label>
		<label>
			<span>Tax number (in case of a business):</span>
			<input type="text" name="tax_num" />
		</label>
		<label>
			<span>Invoicing address:</span>
			<input type="text" name="invoice_address" />
		</label>
		<label>
			<span>Correspondence Address:</span>
			<input type="text" name="address" />
		</label>
		<label>
			<span>Telephone:</span>
			<input type="text" name="phone" />
		</label>
		<label>
			<span>Fax:</span>
			<input type="text" name="fax" />
		</label>
		<label>
			<span>Email:</span>
			<input type="text" name="email" />
		</label>
	</fieldset>







	<fieldset class="fs_ertekbecsles">
		<input type="hidden" name="fieldset_2" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Details of property(ies) to be appraised (by topographical lot number)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>Property No. 1</span>
			</label>
			<label>
				<span>Nature:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Address:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Ownership share to be appraised:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Topographical lot number:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Lot area (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Gross floor area of superstructures:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Number of superstructures:</span>
				<input type="text" name="realty_num_1" />
			</label>
			<br/>
			<label>
				<span>Existing appraisal available:</span>
				<input type="checkbox" name="realty_prev_b_1" class="checkbox" />
			</label>
			<label>
				<span>Prepared by:</span>
				<input type="text" name="realty_maker_1" />
			</label>
			<label>
				<span>Appraisal date:</span>
				<input type="text" name="realty_date_1" />
			</label>
			<label>
				<span>The financial institution it was prepared for:</span>
				<input type="text" name="realty_bank_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>Additional property</span></div>
	</fieldset>






	<fieldset class="fs_ertekbecsles">
		<input type="hidden" name="fieldset_3" value="Értékbecslés célja" />
		<label>
			<span>Purpose of appraisal:</span>
			<select name="est_goal">
				<option value="Hitelfedezet">Loan collateral</option>
				<option value="Értékesítés">Sale</option>
				<option value="Igazságügyi">Forensic</option>
				<option value="Egyéb">Other</option>
			</select>
		</label>
		<br/>
		<label>
			<span>If other, please provide details:</span>
			<textarea name="est_goal_other"></textarea>
		</label>
		<br/>
		<label>
			<span>In case of loan collateral please indicate bank:</span>
			<select name="est_bank">
				<option value="">Please select a bank</option>
				<option value="AXA Bank (korábban ELLA Bank)">AXA Bank (former ELLA Bank)</option>
				<option value="Budapest Bank Zrt.">Budapest Bank Ltd</option>
				<option value="CIB Bank Zrt.">CIB Bank Ltd</option>
				<option value="CIB Lízing Csoport">CIB Leasing Group</option>
				<option value="Commerzbank Zrt.">Commerzbank Ltd</option>
				<option value="Debt-Invest Zrt.">Debt-Invest Ltd</option>
				<option value="Duna Takarék Bank Zrt.">Duna Savings Bank Ltd</option>
				<option value="Erste Bank Hungary Zrt.">Erste Bank Hungary Ltd</option>
				<option value="Gránit Bank Zrt.">Gránit Bank Ltd</option>
				<option value="Hitelpont Zrt.">Hitelpont Ltd</option>
				<option value="KDB Bank Magyarország Zrt.">KDB Bank Hungary Ltd</option>
				<option value="Lombard Lízing Zrt. ">Lombard Leasing Ltd</option>
				<option value="Magnet Magyar Közösségi Bank ">Magnet Hungarian Community Bank</option>
				<option value="Magyar Export-Import Bank Zrt.">Hungarian Export-Import Bank Ltd</option>
				<option value="MFB Zrt.">MFB Ltd</option>
				<option value="MOL Nyrt.">MOL Plc</option>
				<option value="Oberbank AG">Oberbank AG</option>
				<option value="Raiffeisen Bank Zrt.">Raiffeisen Bank Ltd</option>
				<option value="Sberbank Magyarország Zrt. ">Sberbank Hungary Ltd</option>
				<option value="Turai Takarékszövetkezet">Savings Cooperative of Tura</option>
				<option value="UniCredit Bank Hungary Zrt.">UniCredit Bank Hungary Ltd</option>
				<option value="UniCredit Lízing Hungary Zrt.">UniCredit Leasing Hungary Ltd</option>
				<option value="Egyéb">Other</option>
			</select>
		</label>
		<label>
			<span>Other bank\'s name:</span>
			<input type="text" name="bank_other_name" />
		</label>
		<label>
			<span>Bank client manager name:</span>
			<input type="text" name="bank_manager_name" />
		</label>
		<label>
			<span>Bank client manager telephone number:</span>
			<input type="text" name="bank_manager_phone" />
		</label>
	</fieldset>







	<fieldset class="fs_muszaki_szakertes">
		<input type="hidden" name="fieldset_4" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Details of property(ies) to be appraised (by topographical lot number)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>Property No. 1</span>
			</label>
			<label>
				<span>Nature:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Address:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Ownership share to be appraised:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Topographical lot number:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Lot area (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Gross floor area of superstructures:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Number of superstructures:</span>
				<input type="text" name="realty_num_1" />
			</label>
			<br/>
			<label>
				<span>Existing appraisal available:</span>
				<input type="checkbox" name="realty_prev_b_1" class="checkbox" />
			</label>
			<label>
				<span>Prepared by:</span>
				<input type="text" name="realty_maker_1" />
			</label>
			<label>
				<span>Appraisal date:</span>
				<input type="text" name="realty_date_1" />
			</label>
			<label>
				<span>Purpose of appraisal:</span>
				<input type="text" name="realty_bank_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>Additional property</span></div>
	</fieldset>








	<fieldset class="fs_muszaki_szakertes">
		<input type="hidden" name="fieldset_5" value="A szakvélemény célja" />
		<label>
			<span>Purpose of expertise:</span>
			<textarea name="exp_goal"></textarea>
		</label>
	</fieldset>









	<fieldset class="fs_igazsagugyi_szakertes">
		<input type="hidden" name="fieldset_6" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Details of property(ies) to be appraised (by topographical lot number)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>Property No. 1</span>
			</label>
			<label>
				<span>Nature:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Address:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Ownership share to be appraised:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Topographical lot number:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Lot area (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Gross floor area of superstructures:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Number of superstructures:</span>
				<input type="text" name="realty_num_1" />
			</label>
			<label>
				<span>Other asset involved:</span>
				<input type="text" name="realty_others_1" />
			</label>
			<br/>
			<label>
				<span>Prior expertise available:</span>
				<input type="checkbox" name="realty_prev_b_1" class="checkbox" />
			</label>
			<label>
				<span>Prepared by:</span>
				<input type="text" name="realty_maker_1" />
			</label>
			<label>
				<span>Expertise date:</span>
				<input type="text" name="realty_date_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>Additional property</span></div>
	</fieldset>







	<fieldset class="fs_igazsagugyi_szakertes">
		<input type="hidden" name="fieldset_7" value="Előzmény szakvélemény jogi kéviselőjének adatai" />
		<label class="field_title">
			<span>Details of the legal representative of the prior expertise</span>
		</label>
		<label>
			<span>Name of legal representative:</span>
			<input type="text" name="advocate_name" />
		</label>
		<label>
			<span>Phone number of legal representative:</span>
			<input type="text" name="advocate_phone" />
		</label>
	</fieldset>






	<fieldset class="fs_igazsagugyi_szakertes">
		<input type="hidden" name="fieldset_8" value="A szakvélemény célja" />
		<label>
			<span>Purpose of expertise:</span>
			<select name="exp_goal">
				<option value="piaci érték meghatározása">Establish market value </option>
				<option value="értékcsökkenés meghatározása">Establish depreciation </option>
				<option value="kártalanítási érték meghatározása">Establish indemnification value </option>
				<option value="előzetes szakértői bizonyítás-állagrögzítés">Preliminary expert evidence, record condition </option>
				<option value="bérleti díj/használati díj megállapítása">Establish rent/usage charge </option>
				<option value="elszámolási vita rendezése">Settle a settlement dispute </option>
				<option value="egyéb">Other purpose</option>
			</select>
		</label>
		<label>
			<span>If other, please provide details:</span>
			<textarea name="exp_goal_other"></textarea>
		</label>
	</fieldset>









	<fieldset class="fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<input type="hidden" name="fieldset_9" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Details of property(ies) to be appraised (by topographical lot number)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>Property No. 1</span>
			</label>
			<label>
				<span>Nature:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Address:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Ownership share to be appraised:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Topographical lot number:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Lot area (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Gross floor area of superstructures:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Number of superstructures:</span>
				<input type="text" name="realty_num_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>Additional property</span></div>
	</fieldset>







	<fieldset class="fs_energetikai_vizsgalat">
		<input type="hidden" name="fieldset_10" value="Értékelés célja" />
		<label>
			<span>Purpose of appraisal:</span>
			<select name="rating_goal">
				<option value="Hitelfedezet">Loan collateral</option>
				<option value="Értékesítés">Sale</option>
				<option value="Igazságügyi">Forensic</option>
				<option value="Egyéb">Other</option>
			</select>
		</label>
		<br/>
		<label>
			<span>If other, please provide details:</span>
			<textarea name="rating_goal_other"></textarea>
		</label>
	</fieldset>








	<fieldset class="fs_ingatlannyilvantartasi_ugyintezes">
		<input type="hidden" name="fieldset_11" value="Az ügyintézés célja" />
		<label>
			<span>Administrative purpose:</span>
			<select name="admin_goal">
				<option value="Közös tulajdon megszüntetése">Termination of common ownership</option>
				<option value="Társasház alapítás">Condominium foundation</option>
				<option value="Jogi rendezés">Legal settlement</option>
				<option value="Egyéb">Other</option>
			</select>
		</label>
		<br/>
		<label>
			<span>If other, please provide details:</span>
			<textarea name="admin_goal_other"></textarea>
		</label>
	</fieldset>







	<fieldset class="fs_projektellenorzes">
		<input type="hidden" name="fieldset_12" value="Finanszírozó bank" />
		<label>
			<span>In case of financing, please indicate bank:</span>
			<select name="financing_bank">
				<option value="-">Please select a bank</option>
				<option value="AXA Bank (korábban ELLA Bank)">AXA Bank (former ELLA Bank)</option>
				<option value="Budapest Bank Zrt.">Budapest Bank Ltd</option>
				<option value="CIB Bank Zrt.">CIB Bank Ltd</option>
				<option value="CIB Lízing Csoport">CIB Leasing Group</option>
				<option value="Commerzbank Zrt.">Commerzbank Ltd</option>
				<option value="Debt-Invest Zrt.">Debt-Invest Ltd</option>
				<option value="Duna Takarék Bank Zrt.">Duna Savings Bank Ltd</option>
				<option value="Erste Bank Hungary Zrt.">Erste Bank Hungary Ltd</option>
				<option value="Gránit Bank Zrt.">Gránit Bank Ltd</option>
				<option value="Hitelpont Zrt.">Hitelpont Ltd</option>
				<option value="KDB Bank Magyarország Zrt.">KDB Bank Hungary Ltd</option>
				<option value="Lombard Lízing Zrt. ">Lombard Leasing Ltd</option>
				<option value="Magnet Magyar Közösségi Bank ">Magnet Hungarian Community Bank</option>
				<option value="Magyar Export-Import Bank Zrt.">Hungarian Export-Import Bank Ltd</option>
				<option value="MFB Zrt.">MFB Ltd</option>
				<option value="MOL Nyrt.">MOL Plc</option>
				<option value="Oberbank AG">Oberbank AG</option>
				<option value="Raiffeisen Bank Zrt.">Raiffeisen Bank Ltd</option>
				<option value="Sberbank Magyarország Zrt. ">Sberbank Hungary Ltd</option>
				<option value="Takarékbank Zrt.">Takarékbank Ltd</option>
				<option value="Turai Takarékszövetkezet">Savings Cooperative of Tura</option>
				<option value="UniCredit Bank Hungary Zrt.">UniCredit Bank Hungary Ltd</option>
				<option value="UniCredit Lízing Hungary Zrt.">UniCredit Leasing Hungary Ltd</option>
				<option value="Egyéb">Other</option>
			</select>
		</label>
		<label>
			<span>Other bank\'s name:</span>
			<input type="text" name="bank_other_name" />
		</label>
		<label>
			<span>Bank client manager name:</span>
			<input type="text" name="bank_manager_name" />
		</label>
		<label>
			<span>Bank client manager telephone number:</span>
			<input type="text" name="bank_manager_phone" />
		</label>
	</fieldset>








	<fieldset class="fs_ertekbecsles fs_muszaki_szakertes fs_igazsagugyi_szakertes fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<label class="captcha">
			<span><img class="vericode" src="./bin/captcha.php?size=160&index=online" /></span>
			<input type="text" name="captcha" class="required_" maxlength="4" />
		</label>
		<label class="message"></label>
		<label class="send">
			<div class="button w_arrow"><span>Submit</span><img class="arrow" src="images/button_arrow.png" alt="" /></div>
		</label>
	</fieldset>
</form>';

?>

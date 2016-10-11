<h1>Online megbízás</h1>
<p>Intézze gyorsan és egyszerűen ingatlan ügyeit!<br/>Kérem, adja meg az ügyintézéshez szükséges adatokat,<br/>hogy kollégánk felkészülten hívhassa vissza!</p>
<form id="online_form" name="online_form" method="post" action="bin/func_sendOnline.php">
	<fieldset class="fs_null fs_ertekbecsles fs_muszaki_szakertes fs_igazsagugyi_szakertes fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<label>
			<span><strong>Kért szolgáltatás</strong></span>
			<select id="select_service" name="szolgaltatas">
				<option value="fs_null">válasszon űrlapot!</option>
				<option value="fs_ertekbecsles">értékbecslés</option>
				<option value="fs_muszaki_szakertes">műszaki szakértés</option>
				<option value="fs_igazsagugyi_szakertes">igazságügyi szakértés</option>
				<option value="fs_energetikai_vizsgalat">energetikai vizsgálat</option>
				<option value="fs_ingatlan_ertekesites">ingatlan értékesítés</option>
				<option value="fs_ingatlannyilvantartasi_ugyintezes">ingatlannyilvántartási ügyintézés</option>
				<option value="fs_projektellenorzes">projektellenőrzés</option>
			</select>
		</label>
	</fieldset>
	<br/>




	<fieldset class="fs_ertekbecsles fs_muszaki_szakertes fs_igazsagugyi_szakertes fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<input type="hidden" name="fieldset_1" value="Ajánlatkérő adatai" />
		<label class="field_title">
			<span><strong>Ajánlatkérő adatai</strong></span>
		</label>
		<label>
			<span>Név:</span>
			<input type="text" name="name" />
		</label>
		<label>
			<span>Képviselő (vállalkozás esetén):</span>
			<input type="text" name="delegate" />
		</label>
		<label>
			<span>Adószám (vállalkozás esetén):</span>
			<input type="text" name="tax_num" />
		</label>
		<label>
			<span>Számlázási cím:</span>
			<input type="text" name="invoice_address" />
		</label>
		<label>
			<span>Levelezési cím:</span>
			<input type="text" name="address" />
		</label>
		<label>
			<span>Telefon:</span>
			<input type="text" name="phone" />
		</label>
		<label>
			<span>Fax:</span>
			<input type="text" name="fax" />
		</label>
		<label>
			<span>E-mail:</span>
			<input type="text" name="email" />
		</label>
	</fieldset>







	<fieldset class="fs_ertekbecsles">
		<input type="hidden" name="fieldset_2" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Értékelendő ingatlan(ok) adatai (helyrajzi számonként)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>1. ingatlan</span>
			</label>
			<label>
				<span>Jellege:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Címe:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Értékelendő tulajdoni hányad:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Helyrajzi szám:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Telek területe (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Felépítmények bruttó alapterület:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Felépítmények száma:</span>
				<input type="text" name="realty_num_1" />
			</label>
			<br/>
			<label>
				<span>Van meglévő értékbecslés:</span>
				<input type="checkbox" name="realty_prev_b_1" class="checkbox" />
			</label>
			<label>
				<span>Készítő társaság:</span>
				<input type="text" name="realty_maker_1" />
			</label>
			<label>
				<span>Értékbecslés dátuma:</span>
				<input type="text" name="realty_date_1" />
			</label>
			<label>
				<span>Mely pénzintézet részére készült:</span>
				<input type="text" name="realty_bank_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>További ingatlan</span></div>
	</fieldset>






	<fieldset class="fs_ertekbecsles">
		<input type="hidden" name="fieldset_3" value="Értékbecslés célja" />
		<label>
			<span>Értékbecslés célja:</span>
			<select name="est_goal">
				<option value="Hitelfedezet">Hitelfedezet</option>
				<option value="Értékesítés">Értékesítés</option>
				<option value="Igazságügyi">Igazságügyi</option>
				<option value="Egyéb">Egyéb</option>
			</select>
		</label>
		<br/>
		<label>
			<span>Egyéb cél részletezése:</span>
			<textarea name="est_goal_other"></textarea>
		</label>
		<br/>
		<label>
			<span>Hitelfedezet esetén bank megjelölése:</span>
			<select name="est_bank">
				<option value="">Válasszon bankot!</option>
				<option value="AXA Bank (korábban ELLA Bank)">AXA Bank (korábban ELLA Bank)</option>
				<option value="Budapest Bank Zrt.">Budapest Bank Zrt.</option>
				<option value="CIB Bank Zrt.">CIB Bank Zrt.</option>
				<option value="CIB Lízing Csoport">CIB Lízing Csoport</option>
				<option value="Commerzbank Zrt.">Commerzbank Zrt.</option>
				<option value="Debt-Invest Zrt.">Debt-Invest Zrt.</option>
				<option value="Erste Bank Hungary Zrt.">Erste Bank Hungary Zrt.</option>
				<option value="Gránit Bank Zrt.">Gránit Bank Zrt.</option>
				<option value="Hitelpont Zrt.">Hitelpont Zrt.</option>
				<option value="KDB Bank Magyarország Zrt.">KDB Bank Magyarország Zrt.</option>
				<option value="Lombard Lízing Zrt. ">Lombard Lízing Zrt. </option>
				<option value="Magnet Magyar Közösségi Bank ">Magnet Magyar Közösségi Bank </option>
				<option value="Magyar Export-Import Bank Zrt.">Magyar Export-Import Bank Zrt.</option>
				<option value="MFB Zrt.">MFB Zrt.</option>
				<option value="MOL Nyrt.">MOL Nyrt.</option>
				<option value="Oberbank AG">Oberbank AG</option>
				<option value="Raiffeisen Bank Zrt.">Raiffeisen Bank Zrt.</option>
				<option value="Sberbank Magyarország Zrt. ">Sberbank Magyarország Zrt. </option>
				<option value="Turai Takarékszövetkezet">Turai Takarékszövetkezet</option>
				<option value="UniCredit Bank Hungary Zrt.">UniCredit Bank Hungary Zrt.</option>
				<option value="UniCredit Lízing Hungary Zrt.">UniCredit Lízing Hungary Zrt.</option>
			</select>
		</label>
		<label>
			<span>Banki ügyfélmenedzser neve:</span>
			<input type="text" name="bank_manager_name" />
		</label>
		<label>
			<span>Banki ügyfélmenedzser telefonszáma:</span>
			<input type="text" name="bank_manager_phone" />
		</label>
	</fieldset>







	<fieldset class="fs_muszaki_szakertes">
		<input type="hidden" name="fieldset_4" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Értékelendő ingatlan(ok) adatai (helyrajzi számonként)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>1. ingatlan</span>
			</label>
			<label>
				<span>Jellege:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Címe:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Értékelendő tulajdoni hányad:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Helyrajzi szám:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Telek területe (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Felépítmények bruttó alapterület:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Felépítmények száma:</span>
				<input type="text" name="realty_num_1" />
			</label>
			<br/>
			<label>
				<span>Van meglévő értékbecslés:</span>
				<input type="checkbox" name="realty_prev_b_1" class="checkbox" />
			</label>
			<label>
				<span>Készítő társaság:</span>
				<input type="text" name="realty_maker_1" />
			</label>
			<label>
				<span>Értékbecslés dátuma:</span>
				<input type="text" name="realty_date_1" />
			</label>
			<label>
				<span>Milyen célra készült:</span>
				<input type="text" name="realty_bank_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>További ingatlan</span></div>
	</fieldset>








	<fieldset class="fs_muszaki_szakertes">
		<input type="hidden" name="fieldset_5" value="A szakvélemény célja" />
		<label>
			<span>A szakvélemény célja:</span>
			<textarea name="exp_goal"></textarea>
		</label>
	</fieldset>









	<fieldset class="fs_igazsagugyi_szakertes">
		<input type="hidden" name="fieldset_6" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Értékelendő ingatlan(ok) adatai (helyrajzi számonként)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>1. ingatlan</span>
			</label>
			<label>
				<span>Jellege:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Címe:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Értékelendő tulajdoni hányad:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Helyrajzi szám:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Telek területe (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Felépítmények bruttó alapterület:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Felépítmények száma:</span>
				<input type="text" name="realty_num_1" />
			</label>
			<label>
				<span>Egyéb érintett vagyontárgy:</span>
				<input type="text" name="realty_others_1" />
			</label>
			<br/>
			<label>
				<span>Van előzmény szakvélemény:</span>
				<input type="checkbox" name="realty_prev_b_1" class="checkbox" />
			</label>
			<label>
				<span>Készítő társaság:</span>
				<input type="text" name="realty_maker_1" />
			</label>
			<label>
				<span>Szakvélemény dátuma:</span>
				<input type="text" name="realty_date_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>További ingatlan</span></div>
	</fieldset>







	<fieldset class="fs_igazsagugyi_szakertes">
		<input type="hidden" name="fieldset_7" value="Előzmény szakvélemény jogi kéviselőjének adatai" />
		<label class="field_title">
			<span>Előzmény szakvélemény jogi kéviselőjének adatai</span>
		</label>
		<label>
			<span>Jogi képviselő neve:</span>
			<input type="text" name="advocate_name" />
		</label>
		<label>
			<span>Jogi képviselő telefonszáma:</span>
			<input type="text" name="advocate_phone" />
		</label>
	</fieldset>






	<fieldset class="fs_igazsagugyi_szakertes">
		<input type="hidden" name="fieldset_8" value="A szakvélemény célja" />
		<label>
			<span>A szakvélemény célja:</span>
			<select name="exp_goal">
				<option value="piaci érték meghatározása">piaci érték meghatározása</option>
				<option value="értékcsökkenés meghatározása">értékcsökkenés meghatározása</option>
				<option value="kártalanítási érték meghatározása">kártalanítási érték meghatározása</option>
				<option value="előzetes szakértői bizonyítás-állagrögzítés">előzetes szakértői bizonyítás-állagrögzítés</option>
				<option value="bérleti díj/használati díj megállapítása">bérleti díj/használati díj megállapítása</option>
				<option value="elszámolási vita rendezése">elszámolási vita rendezése</option>
				<option value="egyéb">egyéb cél</option>
			</select>
		</label>
		<label>
			<span>Egyéb cél részletezése:</span>
			<textarea name="exp_goal_other"></textarea>
		</label>
	</fieldset>









	<fieldset class="fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<input type="hidden" name="fieldset_9" value="Értékelendő ingatlan(ok) adatai (helyrajzi számonként)" />
		<label class="field_title">
			<span>Értékelendő ingatlan(ok) adatai (helyrajzi számonként)</span>
		</label>
		<div class="ingatlan_adatok">
			<input type="hidden" name="realty_title_1" value="" />
			<label class="realty_num">
				<span>1. ingatlan</span>
			</label>
			<label>
				<span>Jellege:</span>
				<input type="text" name="realty_type_1" />
			</label>
			<label>
				<span>Címe:</span>
				<input type="text" name="realty_address_1" />
			</label>
			<label>
				<span>Értékelendő tulajdoni hányad:</span>
				<input type="text" name="realty_share_1" />
			</label>
			<label>
				<span>Helyrajzi szám:</span>
				<input type="text" name="realty_hrsz_1" />
			</label>
			<label>
				<span>Telek területe (m<sup>2</sup>):</span>
				<input type="text" name="realty_area_1" />
			</label>
			<label>
				<span>Felépítmények bruttó alapterület:</span>
				<input type="text" name="realty_gross_1" />
			</label>
			<label>
				<span>Felépítmények száma:</span>
				<input type="text" name="realty_num_1" />
			</label>
		</div>
		<div class="button add_realty" data-realty_num="1"><span>További ingatlan</span></div>
	</fieldset>







	<fieldset class="fs_energetikai_vizsgalat">
		<input type="hidden" name="fieldset_10" value="Értékelés célja" />
		<label>
			<span>Értékelés célja:</span>
			<select name="rating_goal">
				<option value="Hitelfedezet">Hitelfedezet</option>
				<option value="Értékesítés">Értékesítés</option>
				<option value="Igazságügyi">Igazságügyi</option>
				<option value="Egyéb">Egyéb</option>
			</select>
		</label>
		<br/>
		<label>
			<span>Egyéb cél részletezése:</span>
			<textarea name="rating_goal_other"></textarea>
		</label>
	</fieldset>








	<fieldset class="fs_ingatlannyilvantartasi_ugyintezes">
		<input type="hidden" name="fieldset_11" value="Az ügyintézés célja" />
		<label>
			<span>Az ügyintézés célja:</span>
			<select name="admin_goal">
				<option value="Közös tulajdon megszüntetése">Közös tulajdon megszüntetése</option>
				<option value="Társasház alapítás">Társasház alapítás</option>
				<option value="Jogi rendezés">Jogi rendezés</option>
				<option value="Egyéb">Egyéb</option>
			</select>
		</label>
		<br/>
		<label>
			<span>Egyéb cél részletezése:</span>
			<textarea name="admin_goal_other"></textarea>
		</label>
	</fieldset>







	<fieldset class="fs_projektellenorzes">
		<input type="hidden" name="fieldset_12" value="Finanszírozó bank" />
		<label>
			<span>Finanszírozás esetén bank megjelölése:</span>
			<select name="financing_bank">
				<option value="-">Válasszon bankot!</option>
				<option value="AXA Bank (korábban ELLA Bank)">AXA Bank (korábban ELLA Bank)</option>
				<option value="Budapest Bank Zrt.">Budapest Bank Zrt.</option>
				<option value="CIB Bank Zrt.">CIB Bank Zrt.</option>
				<option value="CIB Lízing Csoport">CIB Lízing Csoport</option>
				<option value="Commerzbank Zrt.">Commerzbank Zrt.</option>
				<option value="Debt-Invest Zrt.">Debt-Invest Zrt.</option>
				<option value="Erste Bank Hungary Zrt.">Erste Bank Hungary Zrt.</option>
				<option value="Gránit Bank Zrt.">Gránit Bank Zrt.</option>
				<option value="Hitelpont Zrt.">Hitelpont Zrt.</option>
				<option value="KDB Bank Magyarország Zrt.">KDB Bank Magyarország Zrt.</option>
				<option value="Lombard Lízing Zrt. ">Lombard Lízing Zrt. </option>
				<option value="Magnet Magyar Közösségi Bank ">Magnet Magyar Közösségi Bank </option>
				<option value="Magyar Export-Import Bank Zrt.">Magyar Export-Import Bank Zrt.</option>
				<option value="MFB Zrt.">MFB Zrt.</option>
				<option value="MOL Nyrt.">MOL Nyrt.</option>
				<option value="Oberbank AG">Oberbank AG</option>
				<option value="Raiffeisen Bank Zrt.">Raiffeisen Bank Zrt.</option>
				<option value="Sberbank Magyarország Zrt. ">Sberbank Magyarország Zrt. </option>
				<option value="Takarékbank Zrt.">Takarékbank Zrt.</option>
				<option value="Turai Takarékszövetkezet">Turai Takarékszövetkezet</option>
				<option value="UniCredit Bank Hungary Zrt.">UniCredit Bank Hungary Zrt.</option>
				<option value="UniCredit Lízing Hungary Zrt.">UniCredit Lízing Hungary Zrt.</option>
			</select>
		</label>
		<label>
			<span>Banki ügyfélmenedzser neve:</span>
			<input type="text" name="bank_manager_name" />
		</label>
		<label>
			<span>Banki ügyfélmenedzser telefonszáma:</span>
			<input type="text" name="bank_manager_phone" />
		</label>
	</fieldset>








	<!--fieldset>
		<label>
			<span>Az ingatlan címe</span>
		</label>
		<label>
			<span>Ország:</span>
			<select name="orszag">
				<option value="Magyarország">Magyarország</option>
			</select>
		</label>
		<label>
			<span>Megye:</span>
			<input type="text" name="megye"/>
		</label>
		<label>
			<span>Település:</span>
			<input type="text" name="telepules"/>
		</label>
		<label>
			<span>Utca:</span>
			<input type="text" name="utca"/>
		</label>
		<label>
			<span>Házszám:</span>
			<input type="text" name="hazszam"/>
		</label>
		<label>
			<span>Helyrajzi szám:</span>
			<input type="text" name="helyrajziszam"/>
		</label>
		<label>
			<span>Külterület:</span>
			<input type="radio" name="kulter_belter" value="0" class="radio" />
		</label>
		<label>
			<span>Belterület:</span>
			<input type="radio" name="kulter_belter" value="1" class="radio" />
		</label>
		<br/>
		<label>
			<span><strong>Az ingatlan típusa</strong></span>
			<select name="tipus">
				<option value="lakás">lakás</option>
				<option value="társasház">társasház</option>
				<option value="kertesház">kertesház</option>
			</select>
		</label>
		<label>
			<span>Szintek száma:</span>
			<input type="text" name="szintek"/>
		</label>
		<label>
			<span>Mérete (m<sup>2</sup>):</span>
			<input type="text" name="meret"/>
		</label>
		<label>
			<span>Telek mérete (m<sup>2</sup>):</span>
			<input type="text" name="telekmeret"/>
		</label>
		<label>
			<span>Építés éve:</span>
			<input type="text" name="epites_eve"/>
		</label>
		<label>
			<span>Építés módja:</span>
			<select name="epites_modja">
				<option value="tégla">tégla</option>
				<option value="ytong">ytong</option>
				<option value="gerenda/rönk">gerenda/rönk</option>
				<option value="könnyűszerkezetes">könnyűszerkezetes</option>
			</select>
		</label>
		<label>
			<span>Osztatlan közös tulajdon:</span>
			<input type="checkbox" name="osztatlan" class="checkbox" />
		</label>
		<label>
			<span>Ingatlan állapota:</span>
			<select name="ingatlan_allapota">
				<option value="Új/újszerű">Új/újszerű</option>
				<option value="Használt">Használt</option>
				<option value="Lelakott">Lelakott</option>
			</select>
		</label>
		<br/>
		<label>
			<span>Ingatlan rövid jellemzése:</span>
			<textarea name="jellemzes"></textarea>
		</label>
	</fieldset-->




	<fieldset class="fs_ertekbecsles fs_muszaki_szakertes fs_igazsagugyi_szakertes fs_energetikai_vizsgalat fs_ingatlan_ertekesites fs_ingatlannyilvantartasi_ugyintezes fs_projektellenorzes">
		<label class="captcha">
			<span><img class="vericode" src="./bin/captcha.php?size=160&index=online" /></span>
			<input type="text" name="captcha" class="required_" maxlength="4" />
		</label>
		<label class="message"></label>
		<label class="send">
			<!-- <input class="form_send button w_arrow" type="submit" value="Elküld" /> -->
			<div class="button w_arrow"><span>Elküld</span><img class="arrow" src="images/button_arrow.png" alt="" /></div>
		</label>
	</fieldset>
</form>

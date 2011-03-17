<?php use_helper('i18n') ?>
<?php slot('title', __('Home')) ?>
<?php use_javascript('leboncoin_index_10735')?>
<?php slot( 'nb_annonce', $iNbAnnonces ) ?>
<table cellspacing="0" cellpadding="0" id="TableContentBottom">
	<tbody>
		<tr>
			<td align="right">
			<div class="Deposer"><a href="<?php echo url_for( 'depotPart1/index' ) ?>"><img
				alt="" src="/images/deposer.png"
				onclick="xt_med('C','23','deposer_bouton','N')"
				onmouseout="this.src='/images/deposer.png'; return true;"
				onmouseover="this.src='/images/deposer_roll.png'; return true;"></a></div>
			<div class="Map MapContainer">
			<div style="background-image: url(/images/transparent.png);"
				class="Map" id="area_image"><img src="/images/transparent.png"
				alt="" usemap="#france_map"></div>

			</div>
			</td>
			<td class="CountyList">
			<!--
			<a
				onmouseout="hide_image('', 1);"
				onmouseover="change_image('', 1);"
				title="Alsace"
				href="http://www.leboncoin.fr/annonces/offres/alsace/" id="county_1">Alsace</a><br>

			<a onmouseout="hide_image('', 2);"
				onmouseover="change_image('', 2);"
				title="Aquitaine"
				href="http://www.leboncoin.fr/annonces/offres/aquitaine/"
				id="county_2" style="text-decoration: none;">Aquitaine</a><br>

			<a onmouseout="hide_image('', 3);"
				onmouseover="change_image('', 3);"
				title="Auvergne"
				href="http://www.leboncoin.fr/annonces/offres/auvergne/"
				id="county_3" style="text-decoration: none;">Auvergne</a><br>

			<a onmouseout="hide_image('', 4);"
				onmouseover="change_image('', 4);"
				title="Basse-Normandie"
				href="http://www.leboncoin.fr/annonces/offres/basse_normandie/"
				id="county_4">Basse-Normandie</a><br>

			<a onmouseout="hide_image('', 5);"
				onmouseover="change_image('', 5);"
				title="Bourgogne"
				href="http://www.leboncoin.fr/annonces/offres/bourgogne/"
				id="county_5" style="text-decoration: none;">Bourgogne</a><br>

			<a onmouseout="hide_image('', 6);"
				onmouseover="change_image('', 6);"
				title="Bretagne"
				href="http://www.leboncoin.fr/annonces/offres/bretagne/"
				id="county_6" style="text-decoration: none;">Bretagne</a><br>

			<a onmouseout="hide_image('', 7);"
				onmouseover="change_image('', 7);"
				title="Centre"
				href="http://www.leboncoin.fr/annonces/offres/centre/" id="county_7"
				style="text-decoration: none;">Centre</a><br>

			<a onmouseout="hide_image('', 8);"
				onmouseover="change_image('', 8);"
				title="Champagne-Ardenne"
				href="http://www.leboncoin.fr/annonces/offres/champagne_ardenne/"
				id="county_8" style="text-decoration: none;">Champagne-Ardenne</a><br>

			<a onmouseout="hide_image('', 9);"
				onmouseover="change_image('', 9);"
				title="Corse" href="http://www.leboncoin.fr/annonces/offres/corse/"
				id="county_9">Corse</a><br>

			<a onmouseout="hide_image('', 10);"
				onmouseover="change_image('', 10);"
				title="Franche-Comté"
				href="http://www.leboncoin.fr/annonces/offres/franche_comte/"
				id="county_10">Franche-Comté</a><br>

			<a onmouseout="hide_image('', 11);"
				onmouseover="change_image('', 11);"
				title="Haute-Normandie"
				href="http://www.leboncoin.fr/annonces/offres/haute_normandie/"
				id="county_11">Haute-Normandie</a><br>



			<a onmouseout="hide_image('', 13);"
				onmouseover="change_image('', 13);"
				title="Languedoc-Roussillon"
				href="http://www.leboncoin.fr/annonces/offres/languedoc_roussillon/"
				id="county_13" style="text-decoration: none;">Languedoc-Roussillon</a><br>

			<a onmouseout="hide_image('', 14);"
				onmouseover="change_image('', 14);"
				title="Limousin"
				href="http://www.leboncoin.fr/annonces/offres/limousin/"
				id="county_14" style="text-decoration: none;">Limousin</a><br>

			<a onmouseout="hide_image('', 15);"
				onmouseover="change_image('', 15);"
				title="Lorraine"
				href="http://www.leboncoin.fr/annonces/offres/lorraine/"
				id="county_15">Lorraine</a><br>

			<a onmouseout="hide_image('', 16);"
				onmouseover="change_image('', 16);"
				title="Midi-Pyrénées"
				href="http://www.leboncoin.fr/annonces/offres/midi_pyrenees/"
				id="county_16" style="text-decoration: none;">Midi-Pyrénées</a><br>

			<a onmouseout="hide_image('', 17);"
				onmouseover="change_image('', 17);"
				title="Nord-Pas-de-Calais"
				href="http://www.leboncoin.fr/annonces/offres/nord_pas_de_calais/"
				id="county_17" style="text-decoration: none;">Nord-Pas-de-Calais</a><br>

			<a onmouseout="hide_image('', 18);"
				onmouseover="change_image('', 18);"
				title="Pays de la Loire"
				href="http://www.leboncoin.fr/annonces/offres/pays_de_la_loire/"
				id="county_18" style="text-decoration: none;">Pays de la Loire</a><br>

			<a onmouseout="hide_image('', 19);"
				onmouseover="change_image('', 19);"
				title="Picardie"
				href="http://www.leboncoin.fr/annonces/offres/picardie/"
				id="county_19" style="text-decoration: none;">Picardie</a><br>

			<a onmouseout="hide_image('', 20);"
				onmouseover="change_image('', 20);"
				title="Poitou-Charentes"
				href="http://www.leboncoin.fr/annonces/offres/poitou_charentes/"
				id="county_20" style="text-decoration: none;">Poitou-Charentes</a><br>

			<a onmouseout="hide_image('', 21);"
				onmouseover="change_image('', 21);"
				title="Provence-Alpes-Côte d'Azur"
				href="http://www.leboncoin.fr/annonces/offres/provence_alpes_cote_d_azur/"
				id="county_21">Provence-Alpes-Côte d'Azur</a><br>

			<a onmouseout="hide_image('', 22);"
				onmouseover="change_image('', 22);"
				title="Rhône-Alpes"
				href="http://www.leboncoin.fr/annonces/offres/rhone_alpes/"
				id="county_22" style="text-decoration: none;">Rhône-Alpes</a><br>
			&nbsp;<br>
			<a onmouseout="hide_image('', 23);"
				onmouseover="change_image('', 23);"
				title="Guadeloupe"
				href="http://www.leboncoin.fr/annonces/offres/guadeloupe/"
				id="county_23">Guadeloupe</a><br>

			<a onmouseout="hide_image('', 24);"
				onmouseover="change_image('', 24);"
				title="Martinique"
				href="http://www.leboncoin.fr/annonces/offres/martinique/"
				id="county_24">Martinique</a><br>

			<a onmouseout="hide_image('', 25);"
				onmouseover="change_image('', 25);"
				title="Guyane"
				href="http://www.leboncoin.fr/annonces/offres/guyane/"
				id="county_25">Guyane</a><br>

			<a onmouseout="hide_image('', 26);"
				onmouseover="change_image('', 26);"
				title="Réunion"
				href="http://www.leboncoin.fr/annonces/offres/reunion/"
				id="county_26">Réunion</a><br>
-->
			<a onmouseout="hide_image('', 12);"
				onmouseover="change_image('', 12);"
				title="Ile-de-France"
				href="<?php echo url_for( 'listing/index?t=&r=1' ) ?>"
				id="county_12" style="text-decoration: none;">Ile-de-France</a><br />
			</td>
		</tr>
	</tbody>
</table>
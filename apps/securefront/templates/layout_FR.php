<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<title><?php include_slot('title') ?></title>
<link rel="shortcut icon" href="/favicon.ico" />
<?php use_stylesheet('accueil') ?>
</head>
<body>
<div id="Page_sky">
<div id="Page">
<table cellspacing="0" cellpadding="0" id="TableContentTop">
	<tbody>
		<tr>
			<td class="Logo"><img
				alt="Petites annonces gratuites d'occasion - leboncoin.fr"
				src="/images/logo_big_new.png" /></td>
			<td class="Text">Legoodcoin.fr part d'une idée simple : la bonne
			affaire<br />
			est au coin de la rue ! Pour passer ou chercher des<br />
			annonces, cliquez sur la région de votre choix et<br />
			trouvez la bonne affaire parmi <strong><?php include_slot( 'nb_annonce' ) ?> annonces</strong>.
			</td>
		</tr>
	</tbody>
</table>
<div><span class="SeparatorText">Simple, rapide et efficace !</span><img
	alt="" src="/images/line.png" /></div>
<?php echo $sf_content ?></div></div>
<map name="france_map">
	<!--
	<area alt="Alsace" onmouseout="hide_image('http://193.164.197.40', 1)" onmouseover="change_image('http://193.164.197.40', 1)" href="http://www.leboncoin.fr/annonces/offres/alsace/" coords="383,88,381,92,372,93,367,89,361,92,364,98,369,99,371,108,365,114,370,124,362,146,370,149,366,154,369,161,378,162,385,157,381,151,385,122,397,96,397,89,385,87" title="Alsace" shape="poly">

	<area alt="Aquitaine" onmouseout="hide_image('http://193.164.197.40', 2)" onmouseover="change_image('http://193.164.197.40', 2)" href="http://www.leboncoin.fr/annonces/offres/aquitaine/" coords="87,349,79,356,89,359,91,369,95,366,111,376,116,376,122,380,128,380,131,369,140,355,135,347,130,345,131,328,132,325,142,329,154,323,171,319,171,312,173,306,174,296,181,294,190,279,183,275,181,255,171,253,164,249,138,274,121,264,103,254,87,349" title="Aquitaine" shape="poly">

	<area alt="Auvergne" onmouseout="hide_image('http://193.164.197.40', 3)" onmouseover="change_image('http://193.164.197.40', 3)" href="http://www.leboncoin.fr/annonces/offres/auvergne/" coords="242,200,219,217,227,226,229,239,223,243,226,263,216,267,212,283,213,298,230,289,230,283,240,295,251,284,270,292,290,271,282,265,271,263,271,255,263,243,266,224,272,217,261,203,243,200" title="Auvergne" shape="poly">

	<area alt="Basse-Normandie" onmouseout="hide_image('http://193.164.197.40', 4)" onmouseover="change_image('http://193.164.197.40', 4)" href="http://www.leboncoin.fr/annonces/offres/basse_normandie/" coords="152,74,162,102,171,107,175,120,166,130,154,121,144,121,140,115,116,117,106,115,101,118,98,113,98,101,89,57,111,62,118,76" title="Basse-Normandie" shape="poly">

	<area alt="Bourgogne" onmouseout="hide_image('http://193.164.197.40', 5)" onmouseover="change_image('http://193.164.197.40', 5)" href="http://www.leboncoin.fr/annonces/offres/bourgogne/" coords="253,124,243,126,240,133,243,145,236,154,241,198,262,202,272,216,272,222,277,229,288,224,289,219,300,222,302,210,313,211,318,195,311,189,318,173,315,159,311,161,300,154,298,144,293,140,289,144,272,145,260,136,253,123" title="Bourgogne" shape="poly">

	<area alt="Bretagne" onmouseout="hide_image('http://193.164.197.40', 6)" onmouseover="change_image('http://193.164.197.40', 6)" href="http://www.leboncoin.fr/annonces/offres/bretagne/" coords="68,163,92,152,105,146,114,137,112,117,102,119,98,116,96,111,88,105,60,107,44,96,0,106,2,142,48,166" title="Bretagne" shape="poly">

	<area alt="Centre" onmouseout="hide_image('http://193.164.197.40', 7)" onmouseover="change_image('http://193.164.197.40', 7)" href="http://www.leboncoin.fr/annonces/offres/centre/" coords="190,103,179,109,173,109,176,118,172,125,174,134,161,159,149,161,147,180,156,189,168,193,173,200,174,209,183,217,202,216,215,215,225,211,230,201,239,199,239,181,235,152,242,144,239,134,227,137,222,128,208,130,205,120,196,116,192,102" title="Centre" shape="poly">

	<area alt="Champagne-Ardenne" onmouseout="hide_image('http://193.164.197.40', 8)" onmouseover="change_image('http://193.164.197.40', 8)" href="http://www.leboncoin.fr/annonces/offres/champagne_ardenne/" coords="292,41,292,41,277,57,270,65,272,76,260,82,260,96,253,105,257,113,254,122,260,135,272,144,289,142,292,139,298,142,301,152,311,159,319,156,325,156,323,147,328,143,323,139,321,128,315,126,313,120,301,110,298,98,300,93,299,82,303,77,301,68,311,66" title="Champagne-Ardenne" shape="poly">

	<area alt="Corse" onmouseout="hide_image('http://193.164.197.40', 9)" onmouseover="change_image('http://193.164.197.40', 9)" href="http://www.leboncoin.fr/annonces/offres/corse/" coords="403,347,374,376,376,396,385,421,400,422,413,381,405,346" title="Corse" shape="poly">

	<area alt="Franche-Comté" onmouseout="hide_image('http://193.164.197.40', 10)" onmouseover="change_image('http://193.164.197.40', 10)" href="http://www.leboncoin.fr/annonces/offres/franche_comte/" coords="339,214,333,220,326,216,319,219,315,212,319,195,313,190,320,173,317,159,322,156,329,155,326,149,334,141,348,141,366,149,366,155,374,170" title="Franche-Comté" shape="poly">

	<area alt="Haute-Normandie" onmouseout="hide_image('http://193.164.197.40', 11)" onmouseover="change_image('http://193.164.197.40', 11)" href="http://www.leboncoin.fr/annonces/offres/haute_normandie/" coords="190,47,190,47,202,59,200,67,202,84,196,88,189,102,178,108,164,102,153,74,148,57" title="Haute-Normandie" shape="poly">

	<area alt="Languedoc-Roussillon" onmouseout="hide_image('http://193.164.197.40', 13)" onmouseover="change_image('http://193.164.197.40', 13)" href="http://www.leboncoin.fr/annonces/offres/languedoc_roussillon/" coords="246,400,230,406,197,404,200,393,214,391,213,386,207,384,206,371,198,359,202,354,229,354,231,346,251,337,256,323,248,316,241,296,251,287,270,292,276,311,284,316,296,313,303,327,295,331,294,340,282,351" title="Languedoc-Roussillon" shape="poly">

	<area alt="Limousin" onmouseout="hide_image('http://193.164.197.40', 14)" onmouseover="change_image('http://193.164.197.40', 14)" href="http://www.leboncoin.fr/annonces/offres/limousin/" coords="181,219,171,225,170,229,173,238,166,246,168,251,180,253,182,255,185,273,191,278,211,284,214,265,224,262,222,243,226,239,226,226,215,217,202,217,182,219" title="Limousin" shape="poly">

	<area alt="Lorraine" onmouseout="hide_image('http://193.164.197.40', 15)" onmouseover="change_image('http://193.164.197.40', 15)" href="http://www.leboncoin.fr/annonces/offres/lorraine/" coords="322,62,311,68,303,70,305,79,300,83,302,94,299,98,302,110,314,119,316,125,323,127,325,140,330,142,334,140,347,139,359,145,369,124,364,114,370,108,368,100,362,96,360,92,368,86,372,91,380,91,386,82" title="Lorraine" shape="poly">

	<area alt="Midi-Pyrénées" onmouseout="hide_image('http://193.164.197.40', 16)" onmouseover="change_image('http://193.164.197.40', 16)" href="http://www.leboncoin.fr/annonces/offres/midi_pyrenees/" coords="192,280,181,296,175,299,173,319,142,330,134,328,132,343,142,355,132,370,129,385,197,397,200,391,212,391,212,388,206,385,205,371,197,360,200,352,227,353,229,345,248,336,255,325,247,318,239,297,232,287,225,295,212,300,210,286" title="Midi-Pyrénées" shape="poly">

	<area alt="Nord-Pas-de-Calais" onmouseout="hide_image('http://193.164.197.40', 17)" onmouseover="change_image('http://193.164.197.40', 17)" href="http://www.leboncoin.fr/annonces/offres/nord_pas_de_calais/" coords="191,30,199,35,207,36,213,41,224,38,224,43,248,50,263,46,281,50,279,29,231,0,190,2" title="Nord-Pas-de-Calais" shape="poly">

	<area alt="Pays de la Loire" onmouseout="hide_image('http://193.164.197.40', 18)" onmouseover="change_image('http://193.164.197.40', 18)" href="http://www.leboncoin.fr/annonces/offres/pays_de_la_loire/" coords="113,118,115,140,106,147,67,164,67,173,80,205,104,222,111,214,115,219,121,215,125,217,126,214,117,185,130,181,142,183,145,181,148,161,161,156,173,134,169,130,159,130,154,123,144,123,140,118" title="Pays de la Loire" shape="poly">

	<area alt="Picardie" onmouseout="hide_image('http://193.164.197.40', 19)" onmouseover="change_image('http://193.164.197.40', 19)" href="http://www.leboncoin.fr/annonces/offres/picardie/" coords="189,43,204,58,202,65,204,84,216,84,231,93,244,91,253,101,258,96,258,82,271,75,269,65,280,52,264,48,247,53,223,45,222,40,215,42,205,37,193,32" title="Picardie" shape="poly">

	<area alt="Poitou-Charentes" onmouseout="hide_image('http://193.164.197.40', 20)" onmouseover="change_image('http://193.164.197.40', 20)" href="http://www.leboncoin.fr/annonces/offres/poitou_charentes/" coords="131,184,119,187,127,214,125,219,114,221,111,217,102,224,101,244,114,258,139,273,172,239,168,227,181,217,173,209,167,194,156,191,147,183,141,186,132,184" title="Poitou-Charentes" shape="poly">


	<area alt="Rhône-Alpes" onmouseout="hide_image('http://193.164.197.40', 22)" onmouseover="change_image('http://193.164.197.40', 22)" href="http://www.leboncoin.fr/annonces/offres/rhone_alpes/" coords="362,212,340,214,333,222,325,218,321,221,313,212,304,211,301,225,290,221,289,226,275,231,270,224,267,233,265,242,271,252,273,260,289,265,292,270,272,292,277,309,284,313,301,311,316,311,318,316,327,318,330,314,323,302,343,282,348,282,345,275,350,270,369,273,382,262,378,228,365,212" title="Rhône-Alpes" shape="poly">

	<area alt="Guadeloupe" onmouseout="hide_image('http://193.164.197.40', 23)" onmouseover="change_image('http://193.164.197.40', 23)" href="http://www.leboncoin.fr/annonces/offres/guadeloupe/" coords="71,473,81,463,79,448,88,451,96,446,111,448,101,439,97,431,89,423,83,430,86,435,81,436,80,442,74,440,66,435,60,441,62,449,63,458,70,473,104,466,110,473,106,478,100,476,98,470,104,468,115,442,119,445,126,441,124,437,118,439,73,481,72,476,71,477,80,476,81,481,72,479" title="Guadeloupe" shape="poly">

	<area alt="Martinique" onmouseout="hide_image('http://193.164.197.40', 24)" onmouseover="change_image('http://193.164.197.40', 24)" href="http://www.leboncoin.fr/annonces/offres/martinique/" coords="146,426,143,434,151,440,149,445,162,457,158,466,164,472,168,470,183,473,186,480,192,470,184,452,176,448,181,444,176,441,185,439,184,435,175,438,169,434,165,429,157,426,148,427" title="Martinique" shape="poly">

	<area alt="Guyane" onmouseout="hide_image('http://193.164.197.40', 25)" onmouseover="change_image('http://193.164.197.40', 25)" href="http://www.leboncoin.fr/annonces/offres/guyane/" coords="227,431,234,436,252,442,259,452,252,461,250,471,243,480,239,478,237,477,228,480,220,477,222,472,223,465,228,463,220,454,221,448,219,445,218,442,223,437,227,432" title="Guyane" shape="poly">

	<area alt="Réunion" onmouseout="hide_image('http://193.164.197.40', 26)" onmouseover="change_image('http://193.164.197.40', 26)" href="http://www.leboncoin.fr/annonces/offres/reunion/" coords="298,439,318,440,324,446,325,451,333,461,330,469,332,477,318,480,310,479,300,472,293,473,292,468,285,456,286,451,290,449,291,445,298,441" title="Réunion" shape="poly">
 
   	<area alt="Provence-Alpes-Côte d'Azur" onmouseout="hide_image('http://193.164.197.40', 21)" onmouseover="change_image('http://193.164.197.40', 21)" href="http://www.leboncoin.fr/annonces/offres/provence_alpes_cote_d_azur/" coords="364,275,350,272,347,275,352,284,343,284,324,303,332,313,328,321,317,318,313,313,299,313,305,328,298,332,295,340,282,354,339,372,377,359,405,325,374,284,366,275" title="Provence-Alpes-Côte d'Azur" shape="poly">
 
  -->
	<area alt="Ile-de-France" onmouseout="hide_image('', 12)"
		onmouseover="change_image('', 12)"
		href="<?php echo url_for('@'.$sf_user->getLang().'_ads').'?gz=1' ?>"
		coords="202,86,191,101,197,114,205,120,209,127,223,127,226,134,238,133,242,124,252,123,255,114,253,105,243,92,231,94,216,86"
		title="Ile-de-France" shape="poly" />


</map>
<script language="JavaScript" type="text/javascript">
	<!--
		 
	<?php for( $i=1; $i<=26; $i++ ): ?>
	preload_image('<?php echo "/images/map_".$i.'.png' ?>');
	<?php endfor ?>
	preload_image('/images/deposer_roll.png');
	//-->
</script>
</body>
</html>

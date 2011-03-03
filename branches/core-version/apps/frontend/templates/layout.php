<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />
<style>
#nav {
	color: #999999;
	margin: 13px 0 4px;
}

.headerline {
	border-bottom: 2px solid #FF6600;
	clear: both;
	font-size: 0;
	height: 6px;
	width: 978px;
	margin-bottom: 3px;
}

.fake_h3 {
    display: inline;
    font-size: 16px;
    font-weight: normal;
}
</style>
</head>
<body>
<table cellspacing="0" cellpadding="0" class="header_wrapper">
	<tbody>
		<tr>
			<td width="211px"><a href="<?php url_for( 'listing/index?r=0' ) ?>"><img border="0"
				id="header_logo"
				alt="Petites annonces gratuites d'occasion - legoodcoin.fr"
				src="/images/legoodcoin.gif" /></a></td>
			<td style="padding-top:3px;"><h1 class="fake_h3"><?php include_slot( 'zone_geo' ) ?></h1></td>
		</tr>
	</tbody>
</table>
<div id="nav"><a href="<?php echo url_for( 'listing/index?r=0' ) ?>">Accueil</a>
&nbsp;|&nbsp; <a href="<?php echo url_for( 'depot/index' ) ?>"
	rel="nofollow">Déposer une annonce</a> &nbsp;|&nbsp; <a
	href="<?php include_slot( 'url_annonce' ) ?>">Consulter les annonces</a>
&nbsp;|&nbsp; <a
	href="<?php echo url_for( 'controle/index' ) ?>">Contrôler les annonces</a>

</div>
<div class="headerline"></div>
<?php echo $sf_content ?>
</body>
</html>

<?php use_helper('I18N') ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />
</head>
<body>

<?php include_slot( 'bIsAdmin' ) ?>

	<div>
		<div id="logo">
			<a href="<?php url_for( 'listing/index?r=0' ) ?>">
				<img border="0" id="header_logo" alt="Petites annonces gratuites d'occasion - legoodcoin.fr" src="/images/legoodcoin.gif" />
			</a>
		</div>
		<div id="region"><?php include_slot( 'zone_geo' ) ?></div>
	</div>
<div id="nav"><a href="<?php echo url_for( 'accueil/index' ) ?>"><?php echo __('Home') ?></a>
&nbsp;|&nbsp; <a href="<?php echo url_for( 'depotPart1/index' ) ?>"
	rel="nofollow"><?php echo __('Post ad') ?></a> &nbsp;|&nbsp; <a
	href="<?php if( has_slot( 'url_annonce' ) ): ?><?php include_slot( 'url_annonce' ) ?><?php else: ?><?php echo url_for( 'listing/index' ) ?><?php endif ?>"><?php echo __('Show ads') ?></a>
&nbsp;|&nbsp; <!-- --> <a
	href="<?php echo url_for( 'mes_annonces_light/index' ) ?>"><?php echo __('My ads') ?></a>
&nbsp;|&nbsp;   <!-- --><?php if( !$sf_user->isAuthenticated() ):?><?php else: ?><a
	href="<?php echo url_for( '@sf_guard_signout' ) ?>">Se deconnecter</a>
&nbsp;|&nbsp; <?php if( $sf_user->hasCredential( 'controle' ) ):?><a
	href="<?php echo url_for( 'controle/index' ) ?>">Contrôler les annonces</a><?php endif ?>
<?php endif ?>
</div>
<div class="headerline"></div>
<?php echo $sf_content ?>
</body>
</html>
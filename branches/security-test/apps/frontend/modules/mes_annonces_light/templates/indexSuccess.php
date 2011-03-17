<?php use_stylesheet( 'depot' ) ?>
<?php use_helper('i18n') ?>
<?php slot('title', __('My active ads'))?>
<style>#depot label { display:inline }</style>
<div id="depot">
	<div>
	<strong><?php echo __('My active ads')?> :</strong> <br />
	<?php echo __('To receive your active ads by mail, enter below the email address used when filing your ad. If you used multiple email addresses for different ads, you must apply for each address.') ?>
	</div><br />
	<div>
	
	<form action="<?php echo url_for( 'mes_annonces_light/create' ) ?>" method="post">
<?php echo $oForm->renderHiddenFields() ?>
	<div class="cell">
		<div><?php echo $oForm[ 'email' ]->renderLabel() ?></div>
		<div><?php echo $oForm[ 'email' ]->render( array( 'size' => 50 ) ) ?></div>	
		<div class="error"><?php echo $oForm[ 'email' ]->renderError() ?></div>
	</div>
<input type="submit" value="valider" />
	</form>
	</div>
</div>
<!-- 	L'adresse email ne comporte aucune annonce active sur le site. -->
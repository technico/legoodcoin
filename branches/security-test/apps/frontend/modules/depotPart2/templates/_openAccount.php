<div id="depot">
<p>Pour valider votre annonce, veuillez choisir un mot de passe.</p>
<form method="post" action="<?php echo url_for( 'depotPart2/create' ) ?>">
<?php echo $oForm->renderHiddenFields() ?>
<?php $aChamps = array( 'password', 'password_again' ); ?>
<?php foreach( $aChamps as $sChampNom ): ?>
	<div class="cell">
		<div><?php echo $oForm[ $sChampNom ]->renderLabel() ?></div>
		<div><?php echo $oForm[ $sChampNom ] ?></div>	
		<div class="error"><?php echo $oForm[ $sChampNom ]->renderError() ?></div>
	</div>
<?php endforeach; ?>
<input type="submit" />
</form>
</div>
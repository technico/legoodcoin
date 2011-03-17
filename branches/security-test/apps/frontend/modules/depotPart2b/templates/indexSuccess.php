<?php use_helper( 'i18n' )?>
<?php slot('title', __('Ad preview'))?>
<?php use_stylesheet( 'depot' )?>
<?php include_partial('depotPart2/adPreview') ?>
<div id="depot">
<form method="post" action="<?php echo url_for( 'depotPart2b/auth' ) ?>">
<div class="cell">
	<div><label style="width:200px" for="auth_password">Entrer votre mot de passe : </label></div>
	<div><input size="25" type="password" name="auth_password" id="auth_password" /> <input type="submit" value="valider" /></div>	
	<div class="error"><?php if( isset( $bHasErrors ) && $bHasErrors ): ?>Mot de passe invalide<?php endif; ?></div>
</div>
</form>
</div>
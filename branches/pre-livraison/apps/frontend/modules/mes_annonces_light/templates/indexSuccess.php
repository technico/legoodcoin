<?php use_stylesheet( 'depot' ) ?>
<style>#depot label { display:inline }</style>
<div id="depot">
	<div>
	<strong>Mes annonces en ligne :</strong> <br />
	Pour recevoir vos annonces actives par mail, remplissez ci-dessous votre
	adresse email renseignée lors de votre dépôt d'annonce. Si vous avez
	utilisé plusieurs adresses email pour des annonces différentes, vous
	devez faire la demande pour chaque adresse.
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
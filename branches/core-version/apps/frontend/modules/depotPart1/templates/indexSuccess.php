<!--
<form method="POST" enctype="multipart/form-data" action="<?php echo url_for( 'depotPart1/create' ) ?>">
<table>
<?php echo $oForm ?>
<tr><td><input type="submit" /></td></tr>
</table>
</form>
<hr />
-->
<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<?php use_stylesheet( 'depot' )?>
<div id="depot">
<div class="maintext">
	<strong>Déposer une annonce sur Le<s>bon</s>goodcoin.fr est GRATUIT. Votre annonce sera validée par notre équipe éditoriale avant mise en ligne. Elle restera sur le site pendant 60 jours. Pendant cette période, vous pourrez la supprimer à tout moment.</strong>
</div>
<?php if( $oForm->hasErrors() ): ?>
<div class="global error">Attention : le formulaire comporte des erreurs.</div>
<?php endif; ?>
<form enctype="multipart/form-data" action="<?php echo url_for('depotPart1/create') ?>" method="POST">
<?php echo $oForm->renderHiddenFields() ?>
<?php $aChamps = array( 'categorie', 'type_annonce', 'titre', 
'contenu', 'prix', 'telephone', 'region', 'departement', 
'code_postal', 'ville', 'mail'  ); ?>
<?php foreach( $aChamps as $sChampNom ): ?>
	<div class="cell">
		<div><?php echo $oForm[ $sChampNom ]->renderLabel() ?></div>
		<div><?php echo $oForm[ $sChampNom ] ?><?php if( $sChampNom == 'prix' ): ?> € (optionnel)<?php endif ?></div>	
		<div class="error"><?php echo $oForm[ $sChampNom ]->renderError() ?></div>
	</div>
<?php endforeach ?>

	<div class="cell">
		<div><?php echo $oForm[ 'photo_1' ]->renderLabel() ?></div>
		<div>
		<?php if( !$sf_user->getAttribute( 'o_photo_1' ) ): ?>
			<?php echo $oForm[ 'photo_1' ] ?>
		<?php else: ?>
			<img src="<?php echo Backref::get468( $sf_user->getAttribute( 'o_photo_1' ) ) ?>" />
			<img src="<?php echo Backref::get80( $sf_user->getAttribute( 'o_photo_1' ) )  ?>" />
			<br />
			<a href="<?php echo url_for( 'depotPart1/DeletePhoto?p=1' ) ?>">supprimer</a>
		<?php endif;?>
		</div>	
		<div class="error"><?php echo $oForm[ 'photo_1' ]->renderError() ?></div>
	</div>
<input type="submit" value="valider" />
</form>
</div>
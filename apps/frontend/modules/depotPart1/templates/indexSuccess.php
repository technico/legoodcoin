<?php use_helper('i18n')?>
<?php use_javascript('switch') ?>
<?php slot( 'title', __('Post an ad') ) ?>
<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<?php use_stylesheet( 'depot' )?>
<div id="depot">
<div class="maintext">
<?php if($sf_request->getParameter('action')==='edit' || $sf_request->getParameter('action')==='modifier'): ?>
	<strong><?php echo __('Edit you ad') ?></strong>
<?php else: ?>
	<strong><?php echo __('Posting an ad on') ?> <?php if($sf_user->getCulture() === 'en'):?>dinkos.com.au<?php else:?>Le<s>bon</s>goodcoin.fr<?php endif?> <?php echo __('is FREE')?>. </strong> <?php echo __('Your ad will be reviewed by our team. After approval, it will be published for a period of 60 days. During this period, you can delete your ad at any time.') ?> 
<?php endif ?>
</div>
<?php if( $oForm->hasErrors() ): ?>
<div class="global error"><?php echo __('Warning : the form have some errors.') ?></div>
<?php endif; ?>
<form enctype="multipart/form-data" action="<?php echo url_for('depotPart1/create') ?>" method="post">
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
<?php use_stylesheet('detail.css')?>
<?php use_stylesheet('depot.css')?>
<?php use_helper('i18n') ?>
<?php slot( 'title', __('Send an email') ) ?> 
<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?> 
<div id="depot">
<h1 style="margin-top:10px; margin-bottom:20px;"><?php echo $Annonce->getTitre();?></h1> 
<h2 style="margin-top:10px; margin-bottom:20px;"><?php echo __('Send an email') ?></h2>
<form action="<?php echo url_for('contact/index?id='.$id) ?>" method="post">
<?php echo $form->renderHiddenFields() ?>
<?php foreach( $form as $field ): ?>
	<div class="cell">
		<div><?php echo $field->renderLabel() ?></div>
		<div><?php echo $field ?></div>	
		<div class="error"><?php echo $field->renderError() ?></div>
	</div>
<?php endforeach ?>
  <div><input type="submit" /></div>
</form>
Attention les saut de ligne font planter le formulaire
</div>
<hr />
<div id="detail"><?php include_partial('detail/detailAnnonce', array('Annonce'=>$Annonce)) ?></div>

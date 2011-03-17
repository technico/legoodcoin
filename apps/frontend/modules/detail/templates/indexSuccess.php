<?php use_helper('i18n');?>
<?php slot('title', __('Ad details')) ?>
<?php use_stylesheet ('detail.css')?>
<?php use_helper('Date');?>
<?php slot( 'url_annonce', url_for( 'listing/index?r='.$Annonce->getRegion()->getId() ) ) ?>
<?php slot( 'zone_geo', $Annonce->getRegion() ) ?>
<?php if( isset( $bIsAdmin ) ): ?>
	<?php slot( 'bIsAdmin') ?>
	<div style="background-color: #00FF00; padding: 3px;border: 1px solid #B8B8B8; margin-bottom: 3px; font-weight:bold; text-align: center">Espace Administrateur</div>
	<?php end_slot() ?> 
<?php endif ?>

<?php if( !isset( $bPreview ) ): ?>
<span class="fine_print">
	<a class="nohistory" href="<?php echo url_for( '@homepage' )?>"><?php echo __('Home') ?></a>
	&gt;	
	<a class="nohistory" href="<?php echo url_for( $backref.'/index?c='.$Annonce->getCategorie()->getId() )?>"><?php echo ucfirst($Annonce->getCategorie()) ?></a>
	&gt;	
	<a class="nohistory" href="<?php echo url_for( $backref.'/index?r='.$Annonce->getRegion()->getId() )?>"><?php echo $Annonce->getRegion() ?></a>
	<!--
	&gt;	
	<a class="nohistory" href="<?php echo url_for( $backref.'/index?r='.$Annonce->getDepartement()->getCode_dep() )?>"><?php echo $Annonce->getDepartement() ?></a>
	-->
	&gt; 
	<!-- <a class="nohistory" href="<?php echo url_for( '@homepage' )?>">Utilitaires</a>
	&gt; -->
	<b><?php echo $Annonce->getTitre() ?></b>
</span>
<?php endif; ?>
<div id="detail">
  <?php include_partial('detail/detailAnnonce', array('Annonce'=>$Annonce)) ?>
	<div class="droit">
		<div class="droit-titre"><?php echo __('Contact the advertiser') ?></div>
		<div style="margin: 3px">
            	<img alt="<?php echo __('Send an email') ?>" style="vertical-align: middle; border:none;" src="/images/adview_mail.gif">
            	<a href="<?php echo url_for( 'contact/index?id='.$Annonce->getId() ) ?>" rel="nofollow"><?php echo __('Send an email') ?></a>
        </div>
		<div style="margin: 3px">
			<img alt="Telephoner" style="vertical-align: middle; border:none;" src="/images/adview_phone.gif">
			<?php echo $Annonce->getAnnonceur()->getPseudo();?> : <?php echo $Annonce->getTelephone();?>
		</div>
	</div>
	
	<div class="droit">
        <div class="droit-titre"><?php echo __('Manage your ad') ?></div>                
        	<div style="margin: 3px">
            	<img alt="<?php echo __('Edit') ?>" style="vertical-align: middle; border:none;" src="/images/adview_modify.gif">
                <a href="<?php echo url_for(  'detail/modifier?id='.$Annonce->getId()  ) ?>" rel="nofollow"><?php echo __('Edit') ?></a>
            </div> 
            <div style="margin: 3px">
            	<img alt="<?php echo __('Delete') ?>" style="vertical-align: middle; border:none;" src="/images/adview_delete.gif">
                <a href="<?php echo url_for(  'detail/supprimer?id='.$Annonce->getId()  ) ?>" rel="nofollow"><?php echo __('Delete') ?></a>
           </div>        
    </div>

	<?php if( isset( $sHtmlControle ) ): ?>
	<div class="droit">
		  <div class="droit-titre" style="background-color:#00FF00;"><?php echo __('Ad control') ?></div>
		  <div style="margin: 3px"><a href="<?php echo url_for( 'controle/accept?id='.$Annonce->getId() ) ?>"><?php echo __('Accept') ?></a></div>
		  <div style="margin: 3px"><a href="<?php echo url_for( 'controle/reject?id='.$Annonce->getId() ) ?>"><?php echo __('Reject') ?></a></div>
	</div>
	<?php endif; ?>
</div>
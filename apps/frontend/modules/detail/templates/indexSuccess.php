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
	<a class="nohistory" href="<?php echo url_for( '@homepage' )?>">Accueil</a>
	&gt;	
	<a class="nohistory" href="<?php echo url_for( $backref.'/index?r='.$Annonce->getRegion()->getId() )?>"><?php echo $Annonce->getRegion() ?></a>
	&gt; 
	<!-- <a class="nohistory" href="<?php echo url_for( '@homepage' )?>">Utilitaires</a>
	&gt; -->
	<b><?php echo $Annonce->getTitre() ?></b>
</span>
<?php endif; ?>
<div id="detail">
	<h1 style="margin-top:10px; margin-bottom:20px;"><?php echo $Annonce->getTitre();?></h1>

	<div id="gauche" style="height:100%">
	<?php if( !isset( $bPreview ) ): ?>
	Mis en ligne par <a href="<?php echo url_for( 'contact/index?id='.$Annonce->getId() ) ?>"><?php echo ucfirst($Annonce->getAnnonceur()->getPseudo());?></a> <!-- Rentrez la valeur dans href -->
	le <?php echo $Annonce->getDateMiseEnLigne(); ?> à <?php echo $Annonce->getHeureMiseEnLigne(); ?>.
	<br /><br />
	<?php endif; ?>
	photo <br /><br />
	<span>Prix : <?php echo $Annonce->getPrix();?> &euro;</span> Ville : <?php echo $Annonce->getCodePostal();?>
	<?php echo $Annonce->getVille();?> <br /><br />
	<?php echo $Annonce->getContenu(); ?>
<div>	
<?php foreach( $Annonce->getAnnoncePhoto() as $oAnnoncePhoto): ?>
<img src="<?php echo Backref::get80( $oAnnoncePhoto->getFilename() ) ?>" /><br />
<img src="<?php echo Backref::get468( $oAnnoncePhoto->getFilename() ) ?>" />
<?php endforeach ?>
</div>
	</div>
	<?php if( !isset( $bPreview ) ): ?>
	<div class="droit">
		<div class="droit-titre">Contacter l'annonceur</div>
		<div style="margin: 3px">
            	<img alt="Envoyer un email" style="vertical-align: middle; border:none;" src="/images/adview_mail.gif">
            	<a href="<?php echo url_for( 'contact/index?id='.$Annonce->getId() ) ?>" rel="nofollow">Envoyer un email</a>
        </div>
		<div style="margin: 3px">
			<img alt="Telephoner" style="vertical-align: middle; border:none;" src="/images/adview_phone.gif">
			<?php echo $Annonce->getAnnonceur()->getPseudo();?> : <?php echo $Annonce->getTelephone();?>
		</div>
	</div>
	
	<div class="droit">
        <div class="droit-titre">Gérer votre annonce</div>                
        	<div style="margin: 3px">
            	<img alt="Modifier" style="vertical-align: middle; border:none;" src="/images/adview_modify.gif">
                <a href="<?php echo url_for(  'detail/modifier?id='.$Annonce->getId()  ) ?>" rel="nofollow">Modifier</a>
            </div> 
            <div style="margin: 3px">
            	<img alt="Supprimer" style="vertical-align: middle; border:none;" src="/images/adview_delete.gif">
                <a href="<?php echo url_for(  'detail/supprimer?id='.$Annonce->getId()  ) ?>" rel="nofollow">Supprimer</a>
           </div>        
    </div>
	<?php endif; ?>
	<?php if( isset( $sHtmlControle ) ): ?>
	<div class="droit">
		  <div class="droit-titre" style="background-color:#00FF00;">Contrôle de l'annonce</div>
		  <div style="margin: 3px"><a href="<?php echo url_for( 'controle/accept?id='.$Annonce->getId() ) ?>">Accepter</a></div>
		  <div style="margin: 3px"><a href="<?php echo url_for( 'controle/reject?id='.$Annonce->getId() ) ?>">Rejeter</a></div>
	</div>
	<?php endif; ?>
</div>
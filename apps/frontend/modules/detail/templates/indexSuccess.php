<?php use_stylesheet ('detail.css')?>
<?php use_helper('Date');?>
<?php slot( 'url_annonce', url_for( 'listing/index?r='.$Annonce->getRegion()->getId() ) ) ?>
<?php slot( 'zone_geo', $Annonce->getRegion() ) ?>
<div id="detail">
	<span class="fine_print">
		<a class="nohistory" href="<?php echo url_for( '@homepage' )?>">Accueil</a>
		&gt;	
		<a class="nohistory" href="<?php echo url_for( 'listing/index?r='.$Annonce->getRegion()->getId() )?>"><?php echo $Annonce->getRegion() ?></a>
		&gt; 
		<!-- <a class="nohistory" href="<?php echo url_for( '@homepage' )?>">Utilitaires</a>
		&gt; -->
		<b><?php echo $Annonce->getTitre() ?></b>
	</span>
	
	<h1 style="margin-top:10px; margin-bottom:20px;"><?php echo $Annonce->getTitre();?></h1>
	<!-- <div class="headerline"></div> -->
	<div id="gauche">
	Mis en ligne par <a href=""><?php echo ucfirst($Annonce->getAnnonceur()->getPseudo());?></a> <!-- Rentrez la valeur dans href -->
	le <?php echo $Annonce->getDateMiseEnLigne(); ?> à <?php echo $Annonce->getHeureMiseEnLigne(); ?>.
	<br /><br />
	photo <br /><br />
	<span>Prix : <?php echo $Annonce->getPrix();?> &euro;</span> Ville : <?php echo $Annonce->getCodePostal();?>
	<?php echo $Annonce->getVille();?> <br /><br />
	<?php echo $Annonce->getContenu(); ?>
	</div>
	<div class="droit">
		<div class="droit-titre">Contacter l'annonceur</div>
		<!-- <a href="">Envoyer un email</a> --> <!-- Entrer dans href la page d'ecriture de mail -->
		<div style="margin: 3px">
			<!-- <img src="/images/adview_phone.gif" />  -->
			<?php echo $Annonce->getAnnonceur()->getPseudo();?> : <?php echo $Annonce->getTelephone();?>
		</div>
	</div>
	<?php if( isset( $sHtmlControle ) ): ?>
	<div class="droit">
		  <div class="droit-titre" style="background-color:#00FF00;">Contrôle de l'annonce</div>
		  <div style="margin: 3px"><a href="<?php echo url_for( 'controle/accept?id='.$Annonce->getId() ) ?>">Accepter</a></div>
		  <div style="margin: 3px"><a href="<?php echo url_for( 'controle/reject?id='.$Annonce->getId() ) ?>">Rejeter</a></div>
	</div>
	<?php endif; ?>
</div>
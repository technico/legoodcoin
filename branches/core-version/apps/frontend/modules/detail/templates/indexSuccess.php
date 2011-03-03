<?php use_helper('Date');?>
<div id="detail">
	<div id="titre-annonce">
		<h1><?php echo $Annonce->getTitre();?></h1>
	</div>
	<div id="gauche">
		<p>
			Mis en ligne par 
				<?php echo ucfirst($Annonce->getAnnonceur()->getPseudo());?> le
				<?php echo $Annonce->getDateMiseEnLigne(); ?> à <?php echo $Annonce->getHeureMiseEnLigne(); ?>.
			<br/>	 
			photo
			<br/>
			<span>Prix : <?php echo $Annonce->getPrix();?> &euro;</span>
			Ville : <?php echo $Annonce->getCodePostal();?> <?php echo $Annonce->getVille();?>
			<br/>
			<?php echo $Annonce->getContenu(); ?>
		</p>
	</div>
	<div id="droit">
		<div id="droit-haut">
			<div class="droit-titre">Contacter l'annonceur</div>
			<a href="">Envoyer un email</a> <!-- Entrer dans href la page d'ecriture de mail -->
			<br/>
			<?php echo $Annonce->getAnnonceur()->getPseudo();?> : <?php echo $Annonce->getTelephone();?>
		</div>
		<div id="droit-bas">
			<div class="droit-titre">G&eacute;rer votre annonce</div>
			<a href="">Modifier</a> <!-- Entrer dans href la page de modification -->
			<br/>
			<a href="">Supprimer</a> <!-- Entrer dans href la page de suppression -->
			<br/>
			<a href="">Remonter en t&ecirc;te de liste</a> <!-- Entrer dans href la page de remontage -->
			<br/>
			<a href="">Mettre en avant</a> <!-- Entrer dans href la page de mise en avant -->
		</div>
	</div>
	<div id="bas">
		<a class="bas" href="">Sauvegarder l'annonce</a> <!-- Entrer dans href la page de sauvegarde -->
		<a class="bas" href="<?php echo url_for('abusif/index'); ?>">Signaler un contenu abusif</a> <!-- Entrer dans href la page abusif -->
		<a class="bas" id ="conseiller" href="">Conseiller l'annonce à un ami</a> <!-- Entrer dans href la page de conseil -->
		<div id="conseil">
			<h2>Conseiller l'annonce à un ami</h2>
			<div id="label">
				<div class="champs">Votre adresse email:</div>
				<div class="champs">L'adresse email de votre ami(e):</div>
			</div>
			<form action="" method="get">
				<div class="champs"><input name="vous" type="text" size="30" /></div>
				<div class="champs"><input name="ami" type="text" size="30" /></div>
				<div class="champs"><input type="submit" value="Envoyer" onclick=""/></div>
			</form>
		</div>
	</div>
</div>
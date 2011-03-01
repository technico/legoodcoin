<?php use_helper('Date');?>
<div id="detail">
<div id="titre-annonce">
	<h1><?php echo $Annonce->getTitre();?></h1>
</div> <!-- /titre-annonce -->
<div id="gauche">	
	<p>Mis en ligne par 
		<?php echo ucfirst($Annonce->getAnnonceur()->getPseudo());?> le
		<?php echo $Annonce->getDateMiseEnLigne(); ?> à <?php echo $Annonce->getHeureMiseEnLigne(); ?>.
	</p>	 
	<p>photo</p>
	<p>Prix : <?php echo $Annonce->getPrix();?> &euro;</p>
	<p>Ville : <?php echo $Annonce->getCodePostal();?> <?php echo $Annonce->getVille();?></p>
	<p><?php echo $Annonce->getContenu(); ?></p>
</div> <!-- /gauche -->
<div id="droit">
	<div id="droit-haut">
		<p>Contacter l'annonceur</p>
		<p><a href="">Envoyer un email</a></p> <!-- Entrer dans href la page d'ecriture de mail -->
		<p><?php echo $Annonce->getAnnonceur();?> : <?php echo $Annonce->getTelephone();?></p>
	</div> <!-- /droit-haut -->
	<div id="droit-bas">
		<p>G&eacute;rer votre annonce</p>
		<p><a href="">Modifier</a></p> <!-- Entrer dans href la page de modification -->
		<p><a href="">Supprimer</a></p> <!-- Entrer dans href la page de suppression -->
		<p><a href="">Remonter en t&ecirc;te de liste</a></p> <!-- Entrer dans href la page de remontage -->
		<p><a href="">Mettre en avant</a></p> <!-- Entrer dans href la page de mise en avant -->
	</div> <!-- /droit-bas -->
</div> <!-- /droit -->
<div id="bas">
	<span><a href="">Sauvegarder l'annonce</a></span> <!-- Entrer dans href la page de sauvegarde -->
	<span><a href="">Signaler un contenu abusif</a></span> <!-- Entrer dans href la page abusif -->
	<span><a href="">Conseiller l'annonce à un ami</a></span> <!-- Entrer dans href la page de conseil -->
</div>
</div>
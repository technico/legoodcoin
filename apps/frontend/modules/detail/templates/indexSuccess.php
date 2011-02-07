<?php foreach($users as $Annonce):?>
	<div id="titre-annonce">
		<h1><?php echo $Annonce->getTitre();?></h1>
	</div> <!-- /titre-annonce -->
	<div id="gauche">	
		<p>Mis en ligne par <?php echo $Annonce->getAnnonceur();?> le <?php echo $Annonce->getDate_control();?></p>
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
			<p><a href="">Modifier</a></p> <!-- Entrer dans href la page d'ecriture de mail -->
			<p><a href="">Supprimer</a></p> <!-- Entrer dans href la page d'ecriture de mail -->
			<p><a href="">Remonter en t&ecirc;te de liste</a></p> <!-- Entrer dans href la page d'ecriture de mail -->
			<p><a href="">Mettre en avant</a></p> <!-- Entrer dans href la page d'ecriture de mail -->
		</div> <!-- /droit-bas -->
	</div> <!-- /droit -->
<?php endforeach; ?>
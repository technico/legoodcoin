<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<style>
h2{
	font-size: 1.5em;
    font-weight: bold;
	margin:0px;
	padding:0px;
}
</style>
<h2 style="margin-top:10px; margin-bottom:20px;">Prévisualisation de votre annonce</h2>
<table>
    <tbody>
		<tr>
		  <th>Catégorie</th>
		  <td><?php echo $aAnnonce[ 'categorie' ] ?></td>
		</tr>    
		<tr>
		  <th>Type annonce</th>
		  <td><?php echo $aAnnonce[ 'type_annonce' ] ?></td>
		</tr>
		<tr>
		  <th>Titre</th>
		  <td><?php echo $aAnnonce[ 'titre' ] ?></td>
		</tr>
		<tr>
		  <th>Contenu</th>
		  <td><?php echo $aAnnonce[ 'contenu' ] ?></td>
		</tr>
	    <tr>
	  		<th>Prix</th>
	  		<td><?php echo $aAnnonce[ 'prix' ]; ?></td>
		</tr>
	    <tr>
	  		<th>Tel</th>
	  		<td><?php echo $aAnnonce[ 'telephone' ]; ?></td>
		</tr>
	    <tr>
	  		<th>Region</th>
	  		<td><?php echo $aAnnonce[ 'region' ]; ?></td>
		</tr>		
		<tr>
	  		<th>Code postal</th>
	  		<td><?php echo $aAnnonce[ 'code_postal' ] ?></td>
		</tr>
	    <tr>
	  		<th>Ville</th>
	  		<td><?php echo $aAnnonce[ 'ville' ]; ?></td>
		</tr>		
	    <tr>
	  		<th>Mail</th>
	  		<td><?php echo $aAnnonce[ 'mail' ]; ?></td>
		</tr>
 	</tbody>
 </table>
 <a href="<?php echo url_for( 'depot/edit' ); ?>">modifier</a>
 <a href="<?php echo url_for( 'depot/merci' ); ?>">confirmer</a>
<h2>Prévisualisation de votre annonce</h2>
<table>
    <tbody>
		<tr>
		  <th>Type annonce</th>
		  <td><?php echo $sTypeAnnonce; ?></td>
		</tr>
		<tr>
		  <th>Titre</th>
		  <td><?php echo $sTitre; ?></td>
		</tr>
		<tr>
		  <th>Contenu</th>
		  <td><?php echo $sContenu; ?></td>
		</tr>
		<tr>
	  		<th>Code postal</th>
	  		<td><?php echo $sCodePostal; ?></td>
		</tr>
	    <tr>
	  		<th>Ville</th>
	  		<td><?php echo $sVille; ?></td>
		</tr>
	    <tr>
	  		<th>Prix</th>
	  		<td><?php echo $sPrix; ?></td>
		</tr>
	    <tr>
	  		<th>Tel</th>
	  		<td><?php echo $sTel; ?></td>
		</tr>
 	</tbody>
 </table>
 <a href="<?php echo url_for( 'depot/index' ); ?>">modifier</a>
 <a href="<?php echo url_for( 'depot/merci' ); ?>">confirmer</a>
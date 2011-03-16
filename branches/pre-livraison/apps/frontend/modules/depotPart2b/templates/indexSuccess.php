<?php use_stylesheet( 'depot' )?>
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
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getCategorie() ?></td>
		</tr>    
		<tr>
		  <th>Type annonce</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getTypeAnnonce() ?></td>
		</tr>
		<tr>
		  <th>Titre</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getTitre() ?></td>
		</tr>
		<tr>
		  <th>Contenu</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getContenu() ?></td>
		</tr>
	    <tr>
	  		<th>Prix</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getPrix(); ?></td>
		</tr>
	    <tr>
	  		<th>Tel</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getTelephone(); ?></td>
		</tr>
	    <tr>
	  		<th>Region</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getRegion(); ?></td>
		</tr>
	    <tr>
	  		<th>Departement</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getDepartement(); ?></td>
		</tr>			
		<tr>
	  		<th>Code postal</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getCode_postal() ?></td>
		</tr>
	    <tr>
	  		<th>Ville</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getVille(); ?></td>
		</tr>		
	    <tr>
	  		<th>Mail</th>
	  		<td><?php echo $sf_user->getAttribute( 's_mail_annonceur' ); ?></td>
		</tr>
		<?php if( $sf_user->getAttribute( 'o_photo_1' ) ): ?>
	    <tr>
	  		<th>Photo 1</th>
	  		<td><img src="<?php echo Backref::get80( $sf_user->getAttribute( 'o_photo_1' ) )  ?>" /></td>
		</tr>
		<?php endif; ?>
 	</tbody>
 </table>
<a href="<?php echo url_for( 'depotPart1/edit' ); ?>">modifier</a>
<div id="depot">
<form method="POST" action="<?php echo url_for( 'depotPart2b/auth' ) ?>">
<div class="cell">
	<div><label style="width:200px" for="auth_password">Entrer votre mot de passe : </label></div>
	<div><input size="25" type="password" name="auth_password" id="auth_password" /> <input type="submit" value="valider" /></div>	
	<div class="error"><?php if( isset( $bHasErrors ) && $bHasErrors ): ?>Mot de passe invalide<?php endif; ?></div>
</div>

</form>
</div>
<?php use_helper('i18n') ?>
<h2 style="margin-top:10px; margin-bottom:20px;"><?php echo __('Ad preview') ?></h2>
<table>
    <tbody>
		<tr>
		  <th><?php echo __('Category') ?> :</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getCategorie() ?></td>
		</tr>    
		<tr>
		  <th><?php echo __('Ad type') ?> :</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getTypeAnnonce() ?></td>
		</tr>
		<tr>
		  <th><?php echo __('Title') ?> :</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getTitre() ?></td>
		</tr>
		<tr>
		  <th><?php echo __('Ad text') ?> :</th>
		  <td><?php echo $sf_user->getAttribute( 'o_annonce' )->getContenu() ?></td>
		</tr>
	    <tr>
	  		<th><?php echo __('Price') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getPrix(); ?></td>
		</tr>
	    <tr>
	  		<th><?php echo __('Phone number') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getTelephone(); ?></td>
		</tr>
	    <tr>
	  		<th><?php echo __('Region') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getRegion(); ?></td>
		</tr>
	    <tr>
	  		<th><?php echo __('Sub-region') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getDepartement(); ?></td>
		</tr>			
		<tr>
	  		<th><?php echo __('Zip code') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getCode_postal() ?></td>
		</tr>
	    <tr>
	  		<th><?php echo __('City') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'o_annonce' )->getVille(); ?></td>
		</tr>		
	    <tr>
	  		<th><?php echo __('Mail') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 's_mail_annonceur' ); ?></td>
		</tr>
		<?php if( $sf_user->getAttribute( 'o_photo_1' ) ): ?>
	    <tr>
	  		<th><?php echo __('Picture 1') ?> :</th>
	  		<td><img src="<?php echo Backref::get80( $sf_user->getAttribute( 'o_photo_1' ) )  ?>" /></td>
		</tr>
		<?php endif; ?>
 	</tbody>
 </table>
<a href="<?php echo url_for( 'depotPart1/edit' ); ?>"><?php echo __('edit') ?></a>
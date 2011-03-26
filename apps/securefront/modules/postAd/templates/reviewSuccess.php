 <h2 style="margin-top:10px; margin-bottom:20px;"><?php echo __('Ad preview') ?></h2>
 <table>
    <tbody>
 <?php foreach($adForm as $field_name=>$field): ?>
 <?php if($field_name==='mail' || $field_name==='_csrf_token' || $field_name==='photo_1' ): continue; endif ?>
 <tr><th><?php echo __($field->getWidget()->getLabel()) ?></th><td><?php $method = 'get'.ucfirst($field_name); echo $sf_user->getAttribute( 'ad' )->$method() ?></td></tr>
 <?php endforeach ?>
 	    <tr>
	  		<th><?php echo __('Mail') ?> :</th>
	  		<td><?php echo $sf_user->getAttribute( 'mail' ); ?></td>
		</tr>
		<?php if( $sf_user->getAttribute( 'path_to_picture_1' ) ): ?>
	    <tr>
	  		<th><?php echo __('Picture 1') ?> :</th>
	  		<td><img alt="" src="<?php echo '/uploads/80x80'.$sf_user->getAttribute( 'path_to_picture_1' ) ?>" /></td>
		</tr>
		<?php endif; ?>
  	</tbody>
 </table>
<?php echo link_to(__('edit'), '@en_edit_ad') ?><br />
<?php echo form_tag('@'.$sf_user->getLang().'_review_ad') ?>
<table><?php echo $authForm ?></table>
<?php echo submit_tag(__('Confirm')) ?>
<?php echo '</form>' ?>
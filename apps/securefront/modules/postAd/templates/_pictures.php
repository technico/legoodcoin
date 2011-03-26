<div class="cell">
<div><?php echo $form['photo_1']->renderLabel() ?></div>
<div><?php if(!$sf_user->getAttribute('path_to_picture_1')): ?> <?php echo $form['photo_1'] ?>
<?php else: ?> <img
	src="<?php echo '/uploads/468x480'.$sf_user->getAttribute('path_to_picture_1') ?>" />
<img
	src="<?php echo '/uploads/80x80'.$sf_user->getAttribute('path_to_picture_1') ?>" />
<br />
<a href="<?php echo url_for('@'.$sf_user->getLang().'_delete_picture') ?>">supprimer</a>
<?php endif;?></div>
<div class="error"><?php echo $form['photo_1']->renderError() ?></div>
</div>
<?php echo form_tag_for($form, '@'.$sf_user->getOptions()->get('default_culture').'_post_ad') ?>
<table><?php echo $form ?></table>
<?php echo submit_tag() ?>
<?php echo '</form>' ?>
<?php echo $sf_user->getAttribute('mail') ?><br />
<?php echo link_to(__('edit'), '@en_edit_ad') ?><br />
<?php echo form_tag('@'.$sf_user->getOptions()->get('default_culture').'_review_ad') ?>
<table><?php echo $authForm ?></table>
<?php echo submit_tag() ?>
<?php echo '</form>' ?>
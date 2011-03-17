<?php use_helper('i18n') ?>
<?php slot('title', __('Thank you for submitting your ad.')) ?>
<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<div id="merci"><?php echo __('Thank you for submitting your ad.') ?><br />
<?php echo __("You're ad will be reviewed by our team before publication.") ?></div>
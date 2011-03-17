<?php use_helper( 'i18n' )?>
<?php use_stylesheet( 'depot' )?>
<?php slot('title', __('Ad preview') )?>
<?php include_partial('adPreview') ?>
<?php include_partial('openAccount', array('oForm'=>$oForm))?>
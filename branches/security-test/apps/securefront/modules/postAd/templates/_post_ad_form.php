<div class="form"><?php if( $form->hasErrors() ): ?>
  <div class="global error"><?php echo __('Warning : the form have some errors.') ?></div>
  <?php endif; ?> <?php echo form_tag_for($form, '@'.$sf_user->getOptions()->get('default_culture').'_post_ad') ?>
  <?php echo $form->renderHiddenFields() ?> <?php foreach($form as $field_name=>$field): ?>
  <?php if($field->isHidden()): continue; endif ?>
  <?php if($field_name == 'photo_1'): continue; endif ?>
  <div class="cell">
    <div><?php echo $field->renderLabel() ?></div>
    <div><?php echo $field ?><?php if($field_name == 'prix'): ?> €
    (optionnel)<?php endif ?></div>
    <div class="error"><?php echo $field->renderError() ?></div>
  </div>
  <?php endforeach ?> 
  <?php include_partial('pictures', array('form'=>$form)) ?>
  <?php echo submit_tag(__('Confirm')) ?><?php echo '</form>' ?>
</div>
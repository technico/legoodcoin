<!-- w3c valide 21/03/2011 à 12:04 -->
<?php slot( 'title', __('Post an ad') ) ?>
<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<?php use_stylesheet( 'depot' )?>
<div id="depot">
  <div class="maintext">
    <strong><?php echo __('Edit you ad') ?></strong>
    <br />
    <strong><?php echo __('Posting an ad on') ?> <?php if($sf_user->getCulture() === 'en'):?>dinkos.com.au<?php else:?>Le<s>bon</s>goodcoin.fr<?php endif?> <?php echo __('is FREE')?>. </strong> <?php echo __('Your ad will be reviewed by our team. After approval, it will be published for a period of 60 days. During this period, you can delete your ad at any time.') ?> 
  </div>
  <?php include_partial('post_ad_form', array('form'=>$form)) ?>
</div>
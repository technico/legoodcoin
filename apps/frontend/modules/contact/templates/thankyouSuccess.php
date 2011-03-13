<?php slot( 'url_annonce', url_for( 'listing/index?r=0' ) ) ?>
<ul>
  <li>Name:    <?php echo $sf_params->get('name') ?></li>
  <li>Email:   <?php echo $sf_params->get('email') ?></li>
  <li>Message: <?php echo $sf_params->get('message') ?></li>
</ul>
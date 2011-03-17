<?php use_helper('i18n', 'date') ?>
<h1 style="margin-top:10px; margin-bottom:20px;"><?php echo $Annonce->getTitre();?></h1> 
<div id="gauche" style="height:100%">
    <?php echo __('Posted by')?> <a href="<?php echo url_for( 'contact/index?id='.$Annonce->getId() ) ?>"><?php echo ucfirst($Annonce->getAnnonceur()->getPseudo());?></a> <!-- Rentrez la valeur dans href -->
	le <?php echo $Annonce->getDateMiseEnLigne(); ?> à <?php echo $Annonce->getHeureMiseEnLigne(); ?>.
    <div>	
  <?php foreach( $Annonce->getAnnoncePhoto() as $oAnnoncePhoto): ?>
    <img src="<?php echo Backref::get80( $oAnnoncePhoto->getFilename() ) ?>" /><br />
    <img src="<?php echo Backref::get468( $oAnnoncePhoto->getFilename() ) ?>" />
  <?php endforeach ?>
  </div>
  <span><?php echo __('Price') ?> : <?php echo $Annonce->getPrix();?> &euro;</span> <?php echo __('City') ?> : <?php echo $Annonce->getCodePostal();?>
  <?php echo $Annonce->getVille();?> <br /><br />
  <?php echo $Annonce->getContenu(); ?>
</div>
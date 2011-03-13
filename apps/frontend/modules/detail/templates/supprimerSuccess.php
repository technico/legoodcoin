<?php use_helper('Date');?>
<div style="height:85px; margin-top:15px">
	<?php if( count( $oAnnonce->getAnnoncePhoto() ) > 0 ): ?><div style="float:left; margin: 3px;"><img border="0" title="" alt="" src="<?php echo Backref::get80( $oAnnonce->getAnnoncePhoto()->getFirst()->getfilename() )?>"></div><?php endif ?>
	<div style="float:left"><h2 style="margin: 0pt; font-weight:bold; font-size: 16px;"><?php echo $oAnnonce->getTitre() ?></h2>
		<span style="font-weight: normal;"> Mise en ligne le <?php echo $oAnnonce->getDateMiseEnLigne(); ?> à <?php echo $oAnnonce->getHeureMiseEnLigne(); ?>.</span><br>
		<?php if( $oAnnonce->getPrix() > 0 ): ?><span style="font-weight:bold;"> Prix : <?php echo $oAnnonce->getPrix(); ?>&nbsp;€</span><?php endif ?>
	</div>
</div>
<form method="post" action="<?php echo url_for( 'detail/supprimer?id='.$id ) ?>">
<h2 style="font-weight:bold; font-size: 14px;">Supprimer votre annonce</h2>
<div>Mot de passe <input type="password" name="mdp" /> <input type="submit" value="Supprimer"/></div>
<?php if( isset( $bAuth ) && !$bAuth ): ?><div style="color:red; font-weight:bold">Mot de passe incorrecte</div><?php endif?>
</form>
<?php echo link_to( 'retour', 'detail/index?id='.$oAnnonce->getId() ) ?>

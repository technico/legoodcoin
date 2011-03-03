<option <?php if( $sRegion <= 0 ): echo 'selected="selected"'; endif;?> value="0">Toute la France</option>
<option value="-1" class="titre_option">-- REGION --</option>
<?php foreach( $aRegions as $oRegion ): ?>
<option <?php if( $sRegion == $oRegion->getId() ): echo 'selected="selected"'; endif;?> value="<?php echo $oRegion->getId() ?>"><?php echo $oRegion->getNom() ?></option>
<?php endforeach ?>
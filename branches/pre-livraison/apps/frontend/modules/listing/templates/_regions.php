<?php
if(
	( !( $aRegions[0]->getRawValue() instanceof Region ) ) 
): 
echo '<option value="',$mZoneGeoId, '">', $sZoneGeoNom;
endif;
?>
<option <?php if( $mZoneGeoId <= 0 ): echo 'selected="selected"'; endif;?> value="0">Toute la France</option>
<option value="-1" class="titre_option"><?php if( $aRegions[0]->getRawValue() instanceof Region ): ?>-- REGION --<?php else: ?>-- DEPT --<?php endif ?></option>
<?php foreach( $aRegions as $oRegion ): ?>
<?php if( $sZoneGeoNom == $oRegion->getNom() ) continue;?>
<option 
<?php 
if(
	( ( $oRegion->getRawValue() instanceof Region ) && $mZoneGeoId == $oRegion->getId() ) ||
	( ( $oRegion->getRawValue() instanceof Departement ) && $mZoneGeoId == $oRegion->getCode_dep() ) 
):
echo 'selected="selected"'; 
endif; ?> 
value="<?php
if(
	( ( $oRegion->getRawValue() instanceof Region ) ) 
):
echo $oRegion->getId();
else: 
echo $oRegion->getCode_dep();
endif;
?>"><?php echo $oRegion->getNom(); ?></option>
<?php endforeach ?>
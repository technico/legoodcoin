<?php
if(
	( !( $aRegions[0]->getRawValue() instanceof Region ) ) 
): 
echo '<option value="',$sRegion, '">', $sNomRegion;
endif;
?>
<option <?php if( $sRegion <= 0 ): echo 'selected="selected"'; endif;?> value="0">Toute la France</option>
<option value="-1" class="titre_option"><?php if( $aRegions[0]->getRawValue() instanceof Region ): ?>-- REGION --<?php else: ?>-- DEPT --<?php endif ?></option>
<?php foreach( $aRegions as $oRegion ): ?>
<?php if( $sNomRegion == $oRegion->getNom() ) continue;?>
<option 
<?php 
if(
	( ( $oRegion->getRawValue() instanceof Region ) && $sRegion == $oRegion->getId() ) ||
	( ( $oRegion->getRawValue() instanceof Departement ) && $sRegion == $oRegion->getCode_dep() ) 
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
<?php
//Doctrine_Table
class ZoneGeoFactory
{
	public static function createZoneGeo( $mZoneGeo )
	{		
		$sClassname = '';
		
		switch( $mZoneGeo )
		{		
			case false:
				$sClassname = 'Region';
				break;
				
			default:
				throw new Exception( 'Zone géographique inconnue' );
		}
		
		return Doctrine::getTable( $sClassname );
	}
};
?>
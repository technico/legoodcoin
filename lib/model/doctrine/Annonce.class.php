<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Annonce extends BaseAnnonce
{
	public function getDateMiseEnLigne(){
		$iTime=strtotime( $this->getDate_control() );
		return format_date( $iTime, 'd MMM')." à ".format_date( $iTime, 'H:mm');
	}

}
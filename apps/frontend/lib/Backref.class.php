<?php
class Backref 
{
	public static function getBackdef( sfRequest $oRequest ) {
		$backref = $oRequest->getParameter( 'backref' );
		return isset( $backref ) ? $backref : 'listing';
	}
}
?>
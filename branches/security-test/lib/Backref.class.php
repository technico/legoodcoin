<?php
class Backref 
{
	public static function getBackdef( sfRequest $oRequest ) {
		$backref = $oRequest->getParameter( 'backref' );
		return isset( $backref ) ? $backref : 'listing';
	}
	
	public static function get80( $sPath )
	{
		return str_replace( '#', '80x80', str_replace( '\\', '/', str_replace( sfConfig::get( 'sf_web_dir' ).DIRECTORY_SEPARATOR, '/', $sPath ) ) );
	}
	
	public static function get468( $sPath )
	{
		return str_replace( '#', '468x480', str_replace( '\\', '/', str_replace( sfConfig::get( 'sf_web_dir' ).DIRECTORY_SEPARATOR, '/', $sPath ) ) );
	}
}
?>
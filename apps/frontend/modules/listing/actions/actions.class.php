<?php
/**
 * listing actions.
 *
 * @package    legoodcoin
 * @subpackage listing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class listingActions extends sfActions
{
	public function getZoneGeoNom( $mZoneGeoId )
	{
		$oZoneGeo = new stdClass();
		$oZoneGeo->nom = 'Toute la France';
	
		if( $mZoneGeoId )
		{
			$oZoneGeo = Doctrine::getTable( 'Region' )->find( $mZoneGeoId );
			if( !$oZoneGeo )
			{
				$oZoneGeo = Doctrine::getTable( 'Departement' )->find( $mZoneGeoId );
			}
		}
		
	    return $oZoneGeo;
	}

	public function getAutresZonesGeo( $oZoneGeo, $mZoneGeoId )
	{
		if( $oZoneGeo instanceof Region )
		{
			$aRegions = Doctrine::getTable( 'Departement' )->findByDql( 'region = ?', $mZoneGeoId );	
		}
		else if( $oZoneGeo instanceof Departement )
		{
			$aRegions = Doctrine::getTable( 'Departement' )->findByDql( 'region = ?', $oZoneGeo->getRegion()->getId() );	
		}
	    else 
	    {
	    	$aRegions = Doctrine::getTable( 'Region' )->findAll();
	    }
	    
	    return $aRegions;
	}
	
	protected function getIndexInputParams( $oRequest )
	{
		$oCategorieTable = Doctrine::getTable( 'Categorie' );
		$this->sTitre      = $oRequest->getParameter( ListingParameters::TITRE    , null );
		$this->sCategorie  = $oRequest->getParameter( ListingParameters::CATEGORIE, null );
		$this->mZoneGeoId  = $oRequest->getParameter( ListingParameters::REGION   , false );
		$this->iPage       = $oRequest->getParameter( ListingParameters::PAGE, 1 );
	    //?
	    $this->sCategorie  = ( $this->sCategorie == 0 ) ? null : $this->sCategorie;
	    	   
	    //Recupération de toutes les catégories
	    $this->aCategories = $oCategorieTable->findALL();
	
	}
	
	public function executeIndex(sfWebRequest $oRequest)
    {
    	//?
	  	$this->backref   = Backref::getBackdef( $oRequest );
	  	  	
	  	$this->getIndexInputParams( $oRequest );

		//DEBUT SEMI-PROPRE
		$oZoneGeo          = $this->getZoneGeoNom( $this->mZoneGeoId );
		$this->sZoneGeoNom = $oZoneGeo->nom;
		$this->aRegions    = $this->getAutresZonesGeo( $oZoneGeo, $this->mZoneGeoId );
		//FIN
			  	
	    $oListingRecherche = new ListingRecherche( $this );
	    
	    $this->oPager      = $oListingRecherche->buildPaginatedQuery( $this->iPage );
	    
	    //Recupération du listing d'annonces
	    $this->aAnnonces = $this->oPager->getResults();
  	}
}

class ListingParameters
{
	const REGION    = 'r';
	const TITRE     = 't';
	const CATEGORIE = 'c';
	const PAGE      = 'p';
}

<?php
class ListingRecherche extends AnnonceFormFilter
{
	protected $oListingAction;
	
	public function __construct( listingActions $oListingAction )
	{
		$this->oListingAction = $oListingAction;	
	}
	
	//Contruction de la requête
	public function buildQuery( array $values )
	{
	    $oQuery = parent::buildQuery
	    ( 
	    	array
	    	(
	    		'titre' => array
	    		( 
	    			'text' => $this->oListingAction->sTitre, 
	    		), 
	    		'categorie'          => $this->oListingAction->sCategorie, 
	    		'etat_de_validation' => 'accepted',
	    	) 
	    );
	  
	    if( $this->oListingAction->mZoneGeoId )
	    {
	    	$oQuery = $oQuery->addWhere
	    	( 
	    		'(region = ? OR departement = ?)', 
	    		array
	    		( 
	    			$this->oListingAction->mZoneGeoId, 
	    			$this->oListingAction->mZoneGeoId 
	    		) 
	    	);  
	    } 
	    		
	    $oQuery->addOrderBy( 'date_control DESC' );
	    
	    return $oQuery;
	}
	
	//Pagination
	public function buildPaginatedQuery( $iPage )
	{
	    $oPager = new sfDoctrinePager( 'Annonce', 5 );
	    $oPager->setQuery( $this->buildQuery( array() ) );
	    $oPager->setPage( $iPage );
	    $oPager->init();
	    return 	$oPager;		
	}
}
?>
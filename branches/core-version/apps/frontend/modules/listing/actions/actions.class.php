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
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->aRegions  = Doctrine::getTable( 'Region' )->createQuery()->execute();

  	//Filtre de recherche 
  	$oFilters = new AnnonceFormFilter();	

    //Pagination
    $this->oPager = new sfDoctrinePager( 'Annonce', 5 );
    
    $this->sTitre = $request->getParameter( 't', null );
    $this->sCategorie = $request->getParameter( 'c', 0 );
    $this->sCategorie = ( $this->sCategorie == 0 ) ? null : $this->sCategorie;
    $this->sRegion = $request->getParameter( 'r', null );
    
    $oQuery = $oFilters->buildQuery( 
    		array ( 'titre' => array ( 'text' => $this->sTitre, ), 
    		        'categorie' => $this->sCategorie, 
    		        'etat_de_validation' => 'accepted') ) ;
    		
    $oQuery->addOrderBy( 'date_control DESC' );
    
    $this->oPager->setQuery( $oQuery );
    $this->oPager->setPage( $request->getParameter( 'p', 1 ) );
    $this->oPager->init();
    $this->aAnnonces = $this->oPager->getResults();
  }
  
  public function executeFilter(sfWebRequest $request)
  {
  	//$this->getUser()->setAttribute('annonce.filters', $request->getParameter( 'annonce', array() ));
  	$this->redirect( 'listing/index' );
  }
}

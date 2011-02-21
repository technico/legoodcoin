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
  	//date_default_timezone_set ( 'Europe/Paris' );
  	
  	$this->aRegions  = Doctrine::getTable('Region')->createQuery()->execute();

  	//Filtre de recherche 
  	$oFilters = new AnnonceFormFilter();	
    $this->aAnnonces = $oFilters->buildQuery( $request->getParameter( 'annonce', array() ) )->execute();   
    $this->filters = $this->getUser()->getAttribute('annonce.filters', array());

    
  }
  
  public function executeFilter(sfWebRequest $request)
  {
  	//$this->getUser()->setAttribute('annonce.filters', $request->getParameter( 'annonce', array() ));
  	$this->redirect( 'listing/index' );
  }
}

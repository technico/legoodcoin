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
  public function preExecute()
  {
  	if( $this->getRequest()->isMethod('post') )
    {
	  $this->getUser()->setAttribute( 'annonce_filters', $this->getRequest()->getParameter( 'annonce_filters' ) );
    }

    $this->form_submit_url = $this->getRequest()->getParameter('module').'/'.$this->getRequest()->getParameter('action');
    
    switch( $this->getRequest()->getParameter('action') )
    {
    	case 'demandes':
    		$type_annonce = 'demande';
    		break;
    	case 'offres':
    		$type_annonce = 'offre';
    		break;
    	default:
    		$type_annonce = '';
    }
    
  	$geo_zone_value = $this->getUser()->getAttribute('annonce_filters[geo_zone]', '0' );
    $only_title     = $this->getUser()->getAttribute('annonce_filters[only_title]', '0' );
    $this->is_only_title_checked = $only_title != '0' ? true : false;
  	$this->filter = new AnnonceFormFilter( $geo_zone_value, $only_title, $this->getUser()->getCountry() );

  	if( $this->getRequest()->hasParameter('c') )
    {
		$tmp_attributes = $this->getUser()->getAttribute( $this->filter->getName() );
		$tmp_attributes['categorie'] = $this->getRequest()->getParameter('c');
		$this->getUser()->setAttribute( $this->filter->getName(),$tmp_attributes );
    }
    
  	$attributes = $this->getUser()->getAttribute( $this->filter->getName() );

  	//Force la valeur "etat_de_validation" à "accepted"
  	$attributes['etat_de_validation'] = 'accepted';
  	$attributes['pays'] = $this->getUser()->getCountry();
  	
    //Pour compter le nombre d'annonces (offre+demande) tout en conservant les criteres de recherche.
    $attributes['type_annonce']       = '';
    $this->filter->bind( $attributes );
    $this->nb_tout     = $this->filter->isValid()===true?count($this->filter->getQuery()->execute()):'';
    
    //Pour compter le nombre d'annonces (offre) tout en conservant les criteres de recherche.
    $attributes['type_annonce']       = 'offre';
    $this->filter->bind( $attributes );
    $this->nb_offres   = $this->filter->isValid()===true?count($this->filter->getQuery()->execute()):'';
    
    //Pour compter le nombre d'annonces (demande) tout en conservant les criteres de recherche.
    $attributes['type_annonce']       = 'demande';
    $this->filter->bind( $attributes );
    $this->nb_demandes = $this->filter->isValid()===true?count($this->filter->getQuery()->execute()):'';  
    //
    
    //last
    $attributes['type_annonce']       = $type_annonce;
    $this->type_annonce               = $type_annonce;
    
    $this->filter->bind( $attributes );
    $this->annonces = array();
    //if($this->filter->isValid())
    //{
    	$this->pager    = $this->paginateQuery( $this->filter->getQuery(), $this->getRequest()->getParameter('p', 1));
    	$this->annonces = $this->pager->getResults();
    //}
  }	

  //Pagination
  public function paginateQuery( $query, $iPage )
  {
	  $oPager = new sfDoctrinePager( 'Annonce', 5 );
	  $oPager->setQuery( $query );
	  $oPager->setPage( $iPage );
	  $oPager->init();
	  return $oPager;		
  }
	
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeDemandes()
  {
    $this->setTemplate('index');	
  }

  public function executeOffres()
  {
    $this->setTemplate('index');	
  }
}

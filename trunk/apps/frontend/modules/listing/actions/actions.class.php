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
  	$this->aAnnonces = Doctrine::getTable('Annonce')->createQuery()->execute();
  	$this->aRegions  = Doctrine::getTable('Region')->createQuery()->execute();
  	$this->form = new AnnonceForm();
  	
  	$oFF = new AnnonceFormFilter();
  	//Filtre les annonces par annonceur
    $oFF->buildQuery( array( 'annonceur' => '1' ) )->execute();
  	date_default_timezone_set ( 'Europe/Paris' );
  }
}

<?php

/**
 * accueil actions.
 *
 * @package    legoodcoin
 * @subpackage accueil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class accueilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->iNbAnnonces = count( Doctrine::getTable( 'Annonce' )->findByDql( 'etat_de_validation = ?', 'accepted' ) );
  	$this->setLayout( 'accueilLayout' );
  }
}

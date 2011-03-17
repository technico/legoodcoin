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
  if (!$request->getParameter('sf_culture'))
  {
      if ($this->getUser()->isFirstRequest())
      {
        $culture = $request->getPreferredCulture(array('en', 'fr'));    
        $this->getUser()->setCulture($culture);
        $this->getUser()->isFirstRequest(false);
      }
      else
      {
        $culture = $this->getUser()->getCulture();
      }
      //$this->redirect('@localized_homepage');
    }
  	$this->iNbAnnonces = count( Doctrine::getTable( 'Annonce' )->findByDql( 'etat_de_validation = ?', 'accepted' ) );
  	if($culture=='en')
  	{
  		$this->setLayout( 'australiaLayout' );
  	}
  	else
  	{
  		$this->setLayout( 'accueilLayout' );
  	}
  }
}
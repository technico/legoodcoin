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
    //var_dump(sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance()->getModuleName());
  	//var_dump($request->getHost());
    if (!$request->getParameter('sf_culture'))
    {
      if (true || $this->getUser()->isFirstRequest())
      {
        $culture = $request->getPreferredCulture(array( 'en_AU', 'fr_FR', 'fr', 'en',));    
        $this->getUser()->setCulture($culture);
        $this->getUser()->isFirstRequest(false);
      }
      else
      {
        $culture = $this->getUser()->getCulture();
      }
      //$this->redirect('@localized_homepage');
    }
echo '<br />', 'Pays : ', $this->getUser()->getCountry();
echo '<br />', 'Lang : ', $this->getUser()->getLang();
echo '<br />', 'Culture : ', $this->getUser()->getCulture();
  	$this->iNbAnnonces = count( Doctrine::getTable( 'Annonce' )->findByDql( 'etat_de_validation = ?', 'accepted' ) );
  	
  	$this->setLayout( 'layout_'.$this->getUser()->getCountry() );
  }
}
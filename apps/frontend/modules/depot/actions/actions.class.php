<?php

/**
 * depot actions.
 *
 * @package    legoodcoin
 * @subpackage depot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class depotActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->annonce_list = Doctrine::getTable('Annonce')->createQuery()->execute();
  }
}

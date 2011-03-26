<?php

/**
 * dynjs actions.
 *
 * @package    legoodcoin
 * @subpackage dynjs
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class dynjsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $request->setRequestFormat('js');
    $this->regions = Doctrine::getTable('Region')->createQuery()->addWhere('pays = ?', $this->getUser()->getCountry())->execute();
  }
}
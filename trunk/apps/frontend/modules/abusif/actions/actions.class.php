<?php

/**
 * abusif actions.
 *
 * @package    legoodcoin
 * @subpackage abusif
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class abusifActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  
  public function executeRemerciement(sfWebRequest $request){}
  
  public function executeEchec(sfWebRequest $request){}
}

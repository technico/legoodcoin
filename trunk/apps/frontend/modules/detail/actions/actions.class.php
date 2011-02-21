<?php

/**
 * detail actions.
 *
 * @package    legoodcoin
 * @subpackage detail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class detailActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
      $this->Annonce = Doctrine::getTable('Annonce')->find(1);
  }
  
  public function executeAbusif(sfWebRequest $request){
  	
  }
}

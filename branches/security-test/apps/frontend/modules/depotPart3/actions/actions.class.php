<?php

/**
 * deportPart3 actions.
 *
 * @package    legoodcoin
 * @subpackage deportPart3
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class depotPart3Actions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
		$this->getUser()->getAttributeHolder()->remove( 's_mail_annonceur' );
		$this->getUser()->getAttributeHolder()->remove( 'o_annonce' );
  }
}

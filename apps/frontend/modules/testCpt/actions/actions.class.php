<?php

/**
 * testCpt actions.
 *
 * @package    legoodcoin
 * @subpackage testCpt
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class testCptActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->oForm = new sfGuardUserForm();
  }
  
  public function executeNew(sfWebRequest $request)
  {
  	$this->oForm = new sfGuardUserForm();
  	$this->oForm->bind( $request->getParameter( $this->oForm->getName() ) );
  	if( $this->oForm->isValid() )
  	{
  		$this->oForm->save();
  		exit( "youpi" );
  	}
  	$this->setTemplate( 'index' );
  }
}

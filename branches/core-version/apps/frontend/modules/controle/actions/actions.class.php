<?php

/**
 * controle actions.
 *
 * @package    legoodcoin
 * @subpackage controle
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class controleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  	$oTableAnnonce = Doctrine::getTable( 'Annonce' );
  	 	
  	$this->Annonce = $oTableAnnonce->findWait();
  	
  	$this->sHtmlControle = true;
  	
  	$this->setTemplate( 'index', 'detail' );
  }

  public function executeAccept(sfWebRequest $request)
  {
  	$oAnnonce = Doctrine::getTable( 'Annonce' )->find( $request->getParameter( 'id' ) );
  	$oAnnonce->setEtat_de_validation( 'accepted' );
  	$oAnnonce->setDate_control( date( 'Y-m-j H:i:s' ) );
  	$oAnnonce->setValidee_par( Doctrine::getTable( 'Administrateur' )->find( 1 ) );
  	$oAnnonce->save();
  	
  	$this->redirect( 'controle/index' );
  }  
  

  public function executeReject(sfWebRequest $request)
  {
  	$oAnnonce = Doctrine::getTable('Annonce')->find( $request->getParameter( 'id' ) );
  	$oAnnonce->setEtat_de_validation( 'rejected' );
  	$oAnnonce->setDate_control( date('Y-m-j H:i:s') );
  	$oAnnonce->setValidee_par( Doctrine::getTable( 'Administrateur' )->find( 1 ) );
  	$oAnnonce->save();
  	
  	$this->redirect( 'controle/index' );
  }  
}
<?php

/**
 * contact actions.
 *
 * @package    legoodcoin
 * @subpackage contact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class contactActions extends sfActions
{
  public function executeIndex($request)
  {
    $this->form = new ContactForm();
 	
    $mId = $request->getParameter( 'id' );

    if( !$mId || !( $oAnnonce = Doctrine::getTable( 'Annonce' )->find( $mId ) ) )//verifier que l'id existe !
    {
    	$this->forward404();
    } 
    $this->id = $mId;
    
    $this->form->setDefault( 'id', $mId );
    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('contact'));
      if ($this->form->isValid())
      {
      	$this->form->send($mId);
        $this->redirect('contact/thankyou?'.http_build_query($this->form->getValues()));
      }
    }
  }
 
	public function executeThankyou()
	{
	}
 }
 ?>
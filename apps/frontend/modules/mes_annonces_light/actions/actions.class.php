<?php
require_once 'C:\development\sfprojets\legoodcoin\lib\vendor\swift\swift_init.php';
/**
 * mes_annonces_light actions.
 *
 * @package    legoodcoin
 * @subpackage mes_annonces_light
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class mes_annonces_lightActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
exit("Code qui  peut partir en quenouille à cause de l'ajout
  		du i18n sur categorie, la grappe d'objet remonté risque d'être trop grosse en memoire !
  		=> a checker !");  	
  	$this->oForm = new MesAnnoncesForm();
  }
  public function executeCreate(sfWebRequest $request)
  {
  	$this->oForm = new MesAnnoncesForm();
  	$this->oForm->bind( $request->getParameter( $this->oForm->getName() ) );
  	if( $this->oForm->isValid() )
  	{
  		$sEmail = $this->oForm->getValue( 'email' );
  		$oSfUser = Doctrine::getTable( 'sfGuardUser' )->findOneByUsername( $sEmail );
  		$a = $oSfUser->getAnnonceur();
  		$a = $a[0];

  // Render message parts 
  // $mailContext = array('name' => 'John Doe');
  // $message->attach(new Swift_Message_Part($this->getPartial('mail/mailHtmlBody', $mailContext), 'text/html'));
  // $message->attach(new Swift_Message_Part($this->getPartial('mail/mailTextBody', $mailContext), 'text/plain'));
 exit('settter le mot de passe de switf mailer : '.__FILE__);
	//Create the Transport
	$transport = Swift_SmtpTransport::newInstance('smtps.upmc.fr', 465)
	  ->setUsername('*')
	  ->setPassword('*')
	  ->setEncryption('ssl');
	  
	//Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);
	
	//Create a message
	$message = Swift_Message::newInstance( 'Vos annonces sur legoodcoin.fr' )
	  ->setFrom(array('olivier.barbier@etu.upmc.fr' => 'Legoodcoin.fr'))
	  ->setTo( array( 'obarbier@me.com' => 'Annonceur', ) )
	  ->setBody($this->getPartial( 'listingAnnonce', array( 'a' => $a ) ) );
	 
	 //Send the message
	$result = $mailer->send($message);
    		
  		$this->redirect( 'mes_annonces_light/ack' );
  	}
  	$this->setTemplate( 'index' );
  }
  
  public function executeAck()
  {
  	
  }
}

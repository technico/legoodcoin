<?php
require_once 'C:\development\sfprojets\legoodcoin\lib\vendor\swift\swift_init.php';
// lib/form/ContactForm.class.php
class ContactForm extends sfForm
{
  protected static $subjects = array('Subject A', 'Subject B', 'Subject C');
 
  public function configure()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormInput( array( 'label' => 'Your name' ) ),
      'email'   => new sfWidgetFormInput( array( 'label' => 'Your email address' ) ),
      'message' => new sfWidgetFormTextarea( array( 'label' => 'Message' ) ),
    ));
    $this->widgetSchema->setNameFormat('contact[%s]');
 
    $this->setValidators(array(
    
      'name'    => new sfValidatorString(array('required' => true), array('required' => 'Please enter your name.')),
      'email'   => new sfValidatorEmail(array(), array('required' => 'Please enter your email address.', 'invalid' => 'Your email address is invalid.')),
    
      'message' => new sfValidatorString
      (
    	array
    	(
    		'min_length' => 4
    	), 
   		array(
        	'required'   => 'The message field is required',
        	'min_length' => 'The message "%value%" is too short. It must be of %min_length% characters at least.',
     	)    
       )
     ));    
  }
  
  public function send($sAnnnonceId)
  {
  	$oAnnonce = Doctrine::getTable( 'Annonce' )->find( $sAnnnonceId );

  	$sTo      = $oAnnonce->getAnnonceur()->getSfGuardUser()->getUsername();
	$sReplyTo = $this->getValue( 'email' );
 exit('settter le mot de passe de switf mailer : '.__FILE__);		
	//Create the Transport
	$transport = Swift_SmtpTransport::newInstance('smtps.upmc.fr', 465)
	  ->setUsername('*')
	  ->setPassword('*')
	  ->setEncryption('ssl');
	  
	//Create the Mailer using your created Transport
	$mailer = Swift_Mailer::newInstance($transport);
	
	//Create a message
	$message = Swift_Message::newInstance('Question sur : '.$oAnnonce->getTitre())
	  ->setFrom(array('olivier.barbier@etu.upmc.fr' => $this->getValue( 'name' )))
	  ->setTo( array( 'obarbier@me.com' => 'Annonceur', ) )
	  ->setBody($this->getValue('message'))
	  ->setReplyTo( $sReplyTo );
	 
	 //Send the message
	$result = $mailer->send($message);
  }
}
?>
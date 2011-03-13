<?php
require_once 'C:\development\sfprojets\legoodcoin\lib\vendor\swift\swift_init.php';
// lib/form/ContactForm.class.php
class ContactForm extends sfForm
{
  protected static $subjects = array('Subject A', 'Subject B', 'Subject C');
 
  public function configure()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormInput( array( 'label' => 'Votre nom' ) ),
      'email'   => new sfWidgetFormInput( array( 'label' => 'Votre adresse email' ) ),
      'message' => new sfWidgetFormTextarea( array( 'label' => 'Texte' ) ),
    ));
    $this->widgetSchema->setNameFormat('contact[%s]');
 
    $this->setValidators(array(
    
      'name'    => new sfValidatorString(array('required' => true)),
      'email'   => new sfValidatorEmail(array(), array('invalid' => 'Email address is invalid.')),
    
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
		
	//Create the Transport
	$transport = Swift_SmtpTransport::newInstance('smtps.upmc.fr', 465)
	  ->setUsername('3003920')
	  ->setPassword('01121986')
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
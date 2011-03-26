<?php
require_once 'C:\development\sfprojets\legoodcoin\lib\vendor\swift\swift_init.php';
// lib/form/ContactForm.class.php
class ContactForm extends sfForm
{
  protected static $subjects = array('Subject A', 'Subject B', 'Subject C');
 
  public function configure()
  {
      $this->configureWidgets();

      $this->configureValidators();

      $this->configureValidatorsErrorMessages();
      
      $this->widgetSchema->setNameFormat('contact[%s]');
  }
	
  public function configureWidgets()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormInput(array('label'    => 'Your name')),
      'email'   => new sfWidgetFormInput(array('label'    => 'Your email address')),
      'message' => new sfWidgetFormTextarea(array('label' => 'Message')),
    ));
  }

  public function configureValidators()
  {
      $this->setValidators(array(
      	'name'    => new sfValidatorString(array('required' => true)),
        'email'   => new sfValidatorEmail(),
        'message' => new sfValidatorString(array('min_length' => 4)))); 
  }
  
  public function configureValidatorsErrorMessages()
  {
    $this->validatorSchema['name']->setMessage('required', 'Please enter your name.');
    
    $this->validatorSchema['email']->setMessage('required', 'Please enter your email address.');
    $this->validatorSchema['email']->setMessage('invalid' , 'Your email address is invalid.');

    // $this->validatorSchema['message']->setMessage('required'  , 'The message field is required');
    // $this->validatorSchema['message']->setMessage('min_length', 'The message "%value%" is too short. It must be of %min_length% characters at least.');  
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
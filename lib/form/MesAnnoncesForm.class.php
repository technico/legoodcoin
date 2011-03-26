<?php
class MesAnnoncesForm extends sfForm
{
	public function configure()
	{
      $this->configureWidgets();

      $this->configureValidators();

      $this->configureValidatorsErrorMessages();
      
	  $this->widgetSchema->setNameFormat( 'MesAnnoncesForm[%s]');
	}
	
	public function configureWidgets()
	{
		$this->setWidget('email', new sfWidgetFormInput());

		$this->widgetSchema->setLabel('email', 'Your email address');	  
	}

	public function configureValidators()
	{
		$query = Doctrine::getTable('sfGuardUser')
		          ->createQuery('u')
		          ->innerJoin('u.Annonceur c')
		          ->innerJoin('c.Annonce a')
		          ->andWhere('a.etat_de_validation = ?', 'accepted');
		          
		$this->setValidator('email', new sfValidatorDoctrineChoice( 
		  array('required' => true, 'column' => 'username', 
		  		'model' => 'sfGuardUser', 'query' => $query))); 
	}
	
	public function configureValidatorsErrorMessages()
	{
	  $this->validatorSchema['email']->setMessage('required', 'Please enter the email address used when filing your ad.');
	  $this->validatorSchema['email']->setMessage('invalid', 'No active ads on the site for this email.');
	}
}
?>
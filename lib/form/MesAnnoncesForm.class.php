<?php
class MesAnnoncesForm extends sfForm
{
	public function configure()
	{
		$this->setWidget( 'email', new sfWidgetFormInput( ) );
		$this->widgetSchema->setLabel( 'email', 'Your email address' );
		
		$this->setValidator
		( 
			'email', 
			new sfValidatorDoctrineChoice
			( 
				array( 'required' => true, 'column' => 'username', 'model' => 'sfGuardUser' ), 
				array
				( 
					'required' => "Please enter the email address used when filing your ad.",
				    'invalid'  => "No active ads on the site for this email."
				)
			)
		);
		
	
		
		$this->widgetSchema->setNameFormat( 'MesAnnoncesForm[%s]');
	}
}
?>
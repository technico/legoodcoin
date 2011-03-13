<?php
class MesAnnoncesForm extends sfForm
{
	public function configure()
	{
		$this->setWidget( 'email', new sfWidgetFormInput( ) );
		$this->widgetSchema->setLabel( 'email', 'Votre adresse email : ' );
		
		$this->setValidator
		( 
			'email', 
			new sfValidatorDoctrineChoice
			( 
				array( 'required' => true, 'column' => 'username', 'model' => 'sfGuardUser' ), 
				array
				( 
					'required' => 'Veuillez indiquer l\'adresse email renseignée lors de votre dépôt d\'annonce',
				    'invalid'  => 'L\'adresse email ne comporte aucune annonce active sur le site.'
				)
			)
		);
		
	
		
		$this->widgetSchema->setNameFormat( 'MesAnnoncesForm[%s]');
	}
}
?>
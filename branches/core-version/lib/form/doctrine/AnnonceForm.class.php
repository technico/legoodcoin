<?php

/**
 * Annonce form.
 *
 * @package    form
 * @subpackage Annonce
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class AnnonceForm extends BaseAnnonceForm
{
  public function configure()
  {
  	$this->setWidget( 'photo_1', new sfWidgetFormInputFile() );
  	$this->setValidator
  	( 
  		'photo_1', 
  		new sfValidatorFile
  		( 
  			array
  			( 
  				'required'   => false, 
  				'mime_types' => 'web_images',
  			    'max_size'   => 1*8*1024*1024
  			) 
  		) 
  	);
  	
  	$this->setWidget( 'mail', new sfWidgetFormInput() );
	$this->setValidator( 'mail', new sfValidatorEmail() );
  	unset( 
  		$this['date_control'],
  		$this['validee_par'],
  		$this['annonceur'],
  		$this['est_abusif'],
//$this['contenu'],//unset after test ib upload image
//$this['telephone'],
//$this['prix'],
  		$this['etat_de_validation']//,
//$this['ville'],
//$this['code_postal'],
//$this['type_annonce'],
//$this['categorie'],
//$this['region'],
//$this['departement'],
//$this['titre']
  	);
	///*
  	$this->widgetSchema['categorie']->setOption( 'add_empty', true );
  	$this->validatorSchema['categorie']->setMessage( 'required', 'Veuillez selectionner une catégorie.' );
  	 	
  	$this->widgetSchema['departement']->setOption( 'add_empty', true );
  	$this->validatorSchema['departement']->setMessage( 'required', 'Veuillez selectionner un département.' );
  	
  	$this->widgetSchema['region']->setOption( 'add_empty', true );
  	$this->validatorSchema['region']->setMessage( 'required', 'Veuillez selectionner une région.' );
  	
  	$this->validatorSchema['ville'] = 
  		new sfValidatorString
  		( 
  			array
  			( 
  				'min_length' => 1, 
  				'max_length' => 50 //http://www.culture-generale.fr/geographie/29-nom-de-ville-francaise-le-plus-long-et-le-plus-court
  			)
  		);
  		
	$this->validatorSchema['ville']->setMessage( 'required', 'Veuillez renseigner une ville.' );

	/*$this->validatorSchema['code_postal'] =
    	new sfValidatorRegex
    	( 
    		array
    		(
    			'required' => false,
    			'pattern'  => "!^0[1-9][0-9]{8}$!",
    		), 
    		array
    		(
    			'invalid' => '%value% n\'est pas un numéro de téléphone valide.'
    		) 
    	);
  */
    $this->validatorSchema['code_postal']->setMessage( 'required', 'Veuillez renseigner un code postal.' );

    $this->validatorSchema['contenu']->setMessage( 'required', 'Veuillez rediger un texte d\'annonce.' );
    
    $this->validatorSchema['titre']->setMessage( 'required', 'Veuillez donner un titre à votre annnonce.' );
    
    $this->validatorSchema['prix']->setMessage( 'invalid', '%value% n\'est pas un prix valide.' );
    
    $this->validatorSchema['telephone'] = 
    	new sfValidatorRegex
    	( 
    		array
    		(
    			'required' => false,
    			'pattern'  => "!^0[1-9][0-9]{8}$!",
    		), 
    		array
    		(
    			'invalid' => '%value% n\'est pas un numéro de téléphone valide.'
    		) 
    	);
    //*/
  }
}
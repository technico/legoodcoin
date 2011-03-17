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
	$this->unsetUnusedFields();
    $this->setupWidgetForVirtualFields();
    $this->setupValidatorForVirtualFields();
    $this->configureWidgetsLabel();
    $this->configureWidgetsOptions();
    $this->configureValidator();
    $this->configureValidatorRequiredMessage();
    $this->configureValidatorInvalidMessage();
  }
  
  protected function unsetUnusedFields()
  {
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
  }
  
  protected function setupWidgetForVirtualFields()
  {
  	$this->setWidget( 'photo_1', new sfWidgetFormInputFile() );
  	$this->setWidget( 'mail', new sfWidgetFormInput() );
  }
  
  protected function setupValidatorForVirtualFields()
  {
  	$this->setValidator(
  	  'photo_1', new sfValidatorFile(
  	     array( 
  		   'required'   => false, 
  		   'mime_types' => 'web_images',
  		   'max_size'   => 1*8*1024*1024
  	     ) 
  	  ) 
  	);
  	
  	$this->setValidator( 'mail', new sfValidatorEmail() ); 
  }
  
  protected function configureWidgetsLabel()
  {
  	$this->widgetSchema['type_annonce']->setLabel('Ad type');
  	$this->widgetSchema['titre']->setLabel('Title');
  	$this->widgetSchema['contenu']->setLabel('Ad text');
  	$this->widgetSchema['telephone']->setLabel('Phone number');
  	$this->widgetSchema['ville']->setLabel('City');
  	$this->widgetSchema['region']->setLabel('Region');
  	$this->widgetSchema['departement']->setLabel('Sub-region');
  	$this->widgetSchema['prix']->setLabel('Price');
  	$this->widgetSchema['photo_1']->setLabel('Picture 1');
  	$this->widgetSchema['categorie']->setLabel('Category'); 
  	$this->widgetSchema['code_postal']->setLabel('Zip code');   	  	  	  	  	  	  	  	
  }
  
  protected function configureWidgetsOptions()
  {
  	$this->widgetSchema['categorie']->setOption( 'add_empty', true );
  	$this->widgetSchema['departement']->setOption( 'add_empty', true );
  	$this->widgetSchema['region']->setOption( 'add_empty', true );  	
  }
  
  protected function configureValidator()
  {
    $this->validatorSchema['ville'] = 
  	  new sfValidatorString( 
  	    array( 
  		  'min_length' => 1, 
  		  'max_length' => 50 
  		  //http://www.culture-generale.fr/geographie/29-nom-de-ville-francaise-le-plus-long-et-le-plus-court
  		)
  	);

	$this->validatorSchema['code_postal'] = 
	  new sfValidatorDoctrineChoice(
	    array(
		  'model'  => 'CodePostaux',
		  'column' => 'Codepos',
		)
	);
    
    $this->validatorSchema['telephone'] = 
      new sfValidatorRegex( 
        array(
    	  'required' => false,
    	  'pattern'  => "!^0[1-9][0-9]{8}$!",
    	)
    );  	
  }
  
  protected function configureValidatorRequiredMessage()
  {
  	$this->validatorSchema['titre']->setMessage('required', 'Please enter a title for your ad.');
  	$this->validatorSchema['contenu']->setMessage('required', 'Please enter an ad text.');
  	$this->validatorSchema['ville']->setMessage('required', 'Please enter a city name.');
  	$this->validatorSchema['region']->setMessage('required', 'Please choose a region.');
  	$this->validatorSchema['departement']->setMessage('required', 'Please choose a sub-region.');
    $this->validatorSchema['categorie']->setMessage('required', 'Please choose a category.' );
  	$this->validatorSchema['code_postal']->setMessage('required', 'Please enter a zip code.');
  	$this->validatorSchema['mail']->setMessage('required', 'Please enter your email.');
  }
  
  protected function configureValidatorInvalidMessage()
  {
  	$this->validatorSchema['region']->setMessage('invalid', '%value% is not a valid region.');
  	$this->validatorSchema['departement']->setMessage('invalid', '%value% is not a valid sub-region.');  	
  	$this->validatorSchema['telephone']->setMessage('invalid', '%value% is not a valid phone number.');
  	$this->validatorSchema['prix']->setMessage('invalid', '%value% is not a valid price.' );
  	$this->validatorSchema['code_postal']->setMessage('invalid', '%value% is not a valid zip code.');
  	$this->validatorSchema['type_annonce']->setMessage('invalid', '%value% is not a valid ad type.');
  	$this->validatorSchema['mail']->setMessage('invalid', '%value% is not a valid email address.');
  	$this->validatorSchema['photo_1']->setMessage('mime_types', 'The file uploaded is not a valid image.');
  }
}
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
    $this->configureFieldsOrder();
  }
  
  protected function unsetUnusedFields()
  {
  	unset( 
  		$this['date_control'],
  		$this['validee_par'],
  		$this['annonceur'],
  		$this['est_abusif'],
  		$this['etat_de_validation']//,
        /*
        $this['contenu'],
        $this['telephone'],
        $this['prix'],
        $this['ville'],
        $this['code_postal'],
        $this['type_annonce'],
        $this['categorie'],
        $this['region'],
        $this['departement'],
        $this['titre']
        */
  	);  	
  }
  
  protected function setupWidgetForVirtualFields()
  {
  	$this->setWidget( 'photo_1', new sfWidgetFormInputFile() );
  	$this->setWidget( 'mail', new sfWidgetFormInput(array('label'=>'Your email')) );
  }
  
  protected function setupValidatorForVirtualFields()
  {
  	$this->setValidator(
  	  'photo_1', new ValidatorFile(
  	     array( 
  		   'required'   => false, 
  		   'mime_types' => 'web_images',
  		   'max_size'   => 1*8*1024*1024
  	     ) 
  	  ) 
  	);
  	
  	$this->setValidator( 'mail', new sfValidatorEmail());
  }
  
  protected function configureWidgetsLabel()
  {
    $this->widgetSchema['nom_annonceur']->setLabel('Your name');
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
  	$this->widgetSchema['pays']->setLabel('Country');   	  	  	  	  	  	  	
  }
  
  protected function configureWidgetsOptions()
  {
    $this->widgetSchema['type_annonce'] = new sfWidgetFormChoice(array('label'=>'Ad type', 'choices' => array('offre' => 'offer', 'demande' => 'demand')));    
  	$this->widgetSchema['categorie']->setOption( 'add_empty', true );
  	$this->widgetSchema['departement']->setOption( 'add_empty', true );
  	$this->widgetSchema['region']->setOption( 'add_empty', true );

  	//on doit pouvoir mettre cette requête dans le coeur de doctrine ...
  	$region_query = Doctrine::getTable('Region')
  	                  ->createQuery('r')
  	                  ->where('r.pays = ?', sfContext::getInstance()->getUser()->getCountry());
  	                  
  	$this->widgetSchema['region']->setOption( 'query', $region_query );      

  	//on doit pouvoir mettre cette requête dans le coeur de doctrine ...
  	$departement_query = Doctrine::getTable('Departement')
  	                  ->createQuery('r')
  	                  ->where('r.pays = ?', sfContext::getInstance()->getUser()->getCountry());
  	                  
  	$this->widgetSchema['departement']->setOption( 'query', $departement_query ); 
  }
  
  protected function configureValidator()
  {
    $this->validatorSchema['type_annonce'] = new sfValidatorChoice(array('choices' => array('offre', 'demande')));
    
    $this->validatorSchema['ville'] = 
  	  new sfValidatorString( 
  	    array( 
  		  'min_length' => 1, 
  		  'max_length' => 50 
  		  //http://www.culture-generale.fr/geographie/29-nom-de-ville-francaise-le-plus-long-et-le-plus-court
  		)
  	);

	$this->validatorSchema['code_postal'] = 
      new sfValidatorRegex( 
        array(
    	  'required' => true,
    	  'pattern'  => "!^[0-9]{5}$!",
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
  
  public function configureFieldsOrder()
  {
    $this->getWidgetSchema()->moveField('pays', sfWidgetFormSchema::FIRST);
    $this->getWidgetSchema()->moveField('region', sfWidgetFormSchema::AFTER, 'pays');
    $this->getWidgetSchema()->moveField('departement', sfWidgetFormSchema::AFTER, 'region');
    $this->getWidgetSchema()->moveField('code_postal', sfWidgetFormSchema::AFTER, 'departement');
    $this->getWidgetSchema()->moveField('ville', sfWidgetFormSchema::AFTER, 'code_postal');
    $this->getWidgetSchema()->moveField('categorie', sfWidgetFormSchema::AFTER, 'ville');
    
    $this->getWidgetSchema()->moveField('type_annonce', sfWidgetFormSchema::AFTER, 'categorie');
    $this->getWidgetSchema()->moveField('nom_annonceur', sfWidgetFormSchema::AFTER, 'type_annonce');
    $this->getWidgetSchema()->moveField('mail', sfWidgetFormSchema::AFTER, 'nom_annonceur');
    $this->getWidgetSchema()->moveField('telephone', sfWidgetFormSchema::AFTER, 'mail');
    $this->getWidgetSchema()->moveField('titre', sfWidgetFormSchema::AFTER, 'telephone');
    $this->getWidgetSchema()->moveField('contenu', sfWidgetFormSchema::AFTER, 'titre');
    $this->getWidgetSchema()->moveField('prix', sfWidgetFormSchema::AFTER, 'contenu');
    $this->getWidgetSchema()->moveField('photo_1', sfWidgetFormSchema::AFTER, 'prix');
  }
}
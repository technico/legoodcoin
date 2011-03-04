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
  	unset( 
  		$this['date_control'],
  		$this['validee_par'],
  		$this['annonceur'],
  		$this['est_abusif'],
  		//$this['contenu'],
  		//$this['telephone'],
  		//$this['prix'],
  		$this['etat_de_validation']//,
  		//$this['ville'],
  		//$this['code_postal'],
  		//$this['type_annonce'],
  		//$this['categorie'],
  		//$this['region'],
  		//$this['departement']
  	);
	  	
  	$this->widgetSchema['categorie']->setOption( 'add_empty', true );
  	$this->validatorSchema['categorie']->setMessage( 'required', 'Veuillez selectionner une catégorie.' );
  	 	
  	$this->widgetSchema['departement']->setOption( 'add_empty', true );
  	$this->validatorSchema['departement']->setMessage( 'required', 'Veuillez selectionner un département.' );
  	
  	$this->widgetSchema['region']->setOption( 'add_empty', true );
  	$this->validatorSchema['region']->setMessage( 'required', 'Veuillez selectionner une région.' );
  	
	$this->validatorSchema['ville']->setMessage( 'required', 'Veuillez renseigner une ville.' );

    $this->validatorSchema['code_postal']->setMessage( 'required', 'Veuillez renseigner un code postal.' );

    $this->validatorSchema['contenu']->setMessage( 'required', 'Veuillez rediger un texte d\'annonce.' );
    
    $this->validatorSchema['titre']->setMessage( 'required', 'Veuillez donner un titre à votre annnonce.' );
  }
}
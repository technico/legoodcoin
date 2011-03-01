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
  	
    $this->validatorSchema['ville'] = new sfValidatorString(
      array('required' => true),
      array('required' => 'Veuillez renseigner une ville.')
    );

    $this->validatorSchema['code_postal'] = new sfValidatorString(
      array('required' => true),
      array('required' => 'Veuillez renseigner un code postal.')
    );

    $this->validatorSchema['contenu'] = new sfValidatorString(
      array('required' => true),
      array('required' => 'Veuillez rediger un texte d\'annonce.')
    );

    $this->validatorSchema['titre'] = new sfValidatorString(
      array('required' => true),
      array('required' => 'Veuillez donner un titre à votre annnonce.')
    );
    
    $this->validatorSchema['telephone'] = new sfValidatorString(
      array('required' => false)
    );
    
    $this->validatorSchema['prix'] = new sfValidatorString(
      array('required' => false)
    );  
  }
}
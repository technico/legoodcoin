<?php

/**
 * Annonce_AU form base class.
 *
 * @package    form
 * @subpackage annonce_au
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseAnnonce_AUForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'etat_de_validation' => new sfWidgetFormInput(),
      'ville'              => new sfWidgetFormInput(),
      'code_postal'        => new sfWidgetFormInput(),
      'contenu'            => new sfWidgetFormTextarea(),
      'titre'              => new sfWidgetFormInput(),
      'prix'               => new sfWidgetFormInput(),
      'est_abusif'         => new sfWidgetFormInput(),
      'type_annonce'       => new sfWidgetFormInput(),
      'categorie'          => new sfWidgetFormDoctrineChoice(array('model' => 'Categorie', 'add_empty' => false)),
      'region'             => new sfWidgetFormDoctrineChoice(array('model' => 'Region_AU', 'add_empty' => false)),
      'departement'        => new sfWidgetFormDoctrineChoice(array('model' => 'Departement_AU', 'add_empty' => false)),
      'telephone'          => new sfWidgetFormInput(),
      'annonceur'          => new sfWidgetFormDoctrineChoice(array('model' => 'Annonceur', 'add_empty' => true)),
      'validee_par'        => new sfWidgetFormDoctrineChoice(array('model' => 'Administrateur', 'add_empty' => true)),
      'date_control'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => 'Annonce_AU', 'column' => 'id', 'required' => false)),
      'etat_de_validation' => new sfValidatorString(array('max_length' => 8, 'required' => false)),
      'ville'              => new sfValidatorString(array('max_length' => 30)),
      'code_postal'        => new sfValidatorString(array('max_length' => 5)),
      'contenu'            => new sfValidatorString(),
      'titre'              => new sfValidatorString(array('max_length' => 50)),
      'prix'               => new sfValidatorNumber(array('required' => false)),
      'est_abusif'         => new sfValidatorInteger(array('required' => false)),
      'type_annonce'       => new sfValidatorString(array('max_length' => 7)),
      'categorie'          => new sfValidatorDoctrineChoice(array('model' => 'Categorie')),
      'region'             => new sfValidatorDoctrineChoice(array('model' => 'Region_AU')),
      'departement'        => new sfValidatorDoctrineChoice(array('model' => 'Departement_AU')),
      'telephone'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'annonceur'          => new sfValidatorDoctrineChoice(array('model' => 'Annonceur', 'required' => false)),
      'validee_par'        => new sfValidatorDoctrineChoice(array('model' => 'Administrateur', 'required' => false)),
      'date_control'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('annonce_au[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Annonce_AU';
  }

}

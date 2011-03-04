<?php

/**
 * Annonce form base class.
 *
 * @package    form
 * @subpackage annonce
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseAnnonceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'etat_de_validation' => new sfWidgetFormChoice(array('choices' => array('wait' => 'wait', 'accepted' => 'accepted', 'rejected' => 'rejected'))),
      'ville'              => new sfWidgetFormInput(),
      'code_postal'        => new sfWidgetFormInput(),
      'contenu'            => new sfWidgetFormTextarea(),
      'titre'              => new sfWidgetFormInput(),
      'prix'               => new sfWidgetFormInput(),
      'est_abusif'         => new sfWidgetFormInput(),
      'type_annonce'       => new sfWidgetFormChoice(array('choices' => array('offre' => 'offre', 'demande' => 'demande'))),
      'categorie'          => new sfWidgetFormDoctrineChoice(array('model' => 'Categorie', 'add_empty' => false)),
      'region'             => new sfWidgetFormDoctrineChoice(array('model' => 'Region', 'add_empty' => false)),
      'departement'        => new sfWidgetFormDoctrineChoice(array('model' => 'Departement', 'add_empty' => false)),
      'telephone'          => new sfWidgetFormInput(),
      'annonceur'          => new sfWidgetFormDoctrineChoice(array('model' => 'Annonceur', 'add_empty' => true)),
      'validee_par'        => new sfWidgetFormDoctrineChoice(array('model' => 'Administrateur', 'add_empty' => true)),
      'date_control'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorDoctrineChoice(array('model' => 'Annonce', 'column' => 'id', 'required' => false)),
      'etat_de_validation' => new sfValidatorChoice(array('choices' => array('wait' => 'wait', 'accepted' => 'accepted', 'rejected' => 'rejected'), 'required' => false)),
      'ville'              => new sfValidatorString(array('max_length' => 30)),
      'code_postal'        => new sfValidatorString(array('max_length' => 5)),
      'contenu'            => new sfValidatorString(array('max_length' => 1024)),
      'titre'              => new sfValidatorString(array('max_length' => 50)),
      'prix'               => new sfValidatorNumber(array('required' => false)),
      'est_abusif'         => new sfValidatorInteger(array('required' => false)),
      'type_annonce'       => new sfValidatorChoice(array('choices' => array('offre' => 'offre', 'demande' => 'demande'))),
      'categorie'          => new sfValidatorDoctrineChoice(array('model' => 'Categorie')),
      'region'             => new sfValidatorDoctrineChoice(array('model' => 'Region')),
      'departement'        => new sfValidatorDoctrineChoice(array('model' => 'Departement')),
      'telephone'          => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'annonceur'          => new sfValidatorDoctrineChoice(array('model' => 'Annonceur', 'required' => false)),
      'validee_par'        => new sfValidatorDoctrineChoice(array('model' => 'Administrateur', 'required' => false)),
      'date_control'       => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('annonce[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Annonce';
  }

}

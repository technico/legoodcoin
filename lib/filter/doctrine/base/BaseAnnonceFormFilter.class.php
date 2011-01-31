<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Annonce filter form base class.
 *
 * @package    filters
 * @subpackage Annonce *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseAnnonceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etat_de_validation' => new sfWidgetFormChoice(array('choices' => array('' => '', 'en attente' => 'en attente', 'validé' => 'validé', 'refusé' => 'refusé'))),
      'ville'              => new sfWidgetFormFilterInput(),
      'code_postal'        => new sfWidgetFormFilterInput(),
      'contenu'            => new sfWidgetFormFilterInput(),
      'titre'              => new sfWidgetFormFilterInput(),
      'telephone'          => new sfWidgetFormFilterInput(),
      'prix'               => new sfWidgetFormFilterInput(),
      'est_abusif'         => new sfWidgetFormFilterInput(),
      'type_annonce'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'demande' => 'demande', 'offre' => 'offre'))),
      'categorie'          => new sfWidgetFormDoctrineChoice(array('model' => 'Categorie', 'add_empty' => true)),
      'region'             => new sfWidgetFormDoctrineChoice(array('model' => 'Region', 'add_empty' => true)),
      'departement'        => new sfWidgetFormDoctrineChoice(array('model' => 'Departement', 'add_empty' => true)),
      'annonceur'          => new sfWidgetFormDoctrineChoice(array('model' => 'Annonceur', 'add_empty' => true)),
      'validee_par'        => new sfWidgetFormDoctrineChoice(array('model' => 'Administrateur', 'add_empty' => true)),
      'date_control'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'etat_de_validation' => new sfValidatorChoice(array('required' => false, 'choices' => array('en attente' => 'en attente', 'validé' => 'validé', 'refusé' => 'refusé'))),
      'ville'              => new sfValidatorPass(array('required' => false)),
      'code_postal'        => new sfValidatorPass(array('required' => false)),
      'contenu'            => new sfValidatorPass(array('required' => false)),
      'titre'              => new sfValidatorPass(array('required' => false)),
      'telephone'          => new sfValidatorPass(array('required' => false)),
      'prix'               => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'est_abusif'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_annonce'       => new sfValidatorChoice(array('required' => false, 'choices' => array('demande' => 'demande', 'offre' => 'offre'))),
      'categorie'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Categorie', 'column' => 'id')),
      'region'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Region', 'column' => 'id')),
      'departement'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Departement', 'column' => 'code_dep')),
      'annonceur'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Annonceur', 'column' => 'id')),
      'validee_par'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Administrateur', 'column' => 'id')),
      'date_control'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('annonce_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Annonce';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'etat_de_validation' => 'Enum',
      'ville'              => 'Text',
      'code_postal'        => 'Text',
      'contenu'            => 'Text',
      'titre'              => 'Text',
      'telephone'          => 'Text',
      'prix'               => 'Number',
      'est_abusif'         => 'Number',
      'type_annonce'       => 'Enum',
      'categorie'          => 'ForeignKey',
      'region'             => 'ForeignKey',
      'departement'        => 'ForeignKey',
      'annonceur'          => 'ForeignKey',
      'validee_par'        => 'ForeignKey',
      'date_control'       => 'Date',
    );
  }
}
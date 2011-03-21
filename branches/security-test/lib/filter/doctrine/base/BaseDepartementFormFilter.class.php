<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Departement filter form base class.
 *
 * @package    filters
 * @subpackage Departement *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseDepartementFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'      => new sfWidgetFormFilterInput(),
      'region'   => new sfWidgetFormDoctrineChoice(array('model' => 'Region', 'add_empty' => true)),
      'pays'     => new sfWidgetFormFilterInput(),
      'slug'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'      => new sfValidatorPass(array('required' => false)),
      'region'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Region', 'column' => 'id')),
      'pays'     => new sfValidatorPass(array('required' => false)),
      'slug'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('departement_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Departement';
  }

  public function getFields()
  {
    return array(
      'code_dep' => 'Number',
      'nom'      => 'Text',
      'region'   => 'ForeignKey',
      'pays'     => 'Text',
      'slug'     => 'Text',
    );
  }
}
<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Departement_AU filter form base class.
 *
 * @package    filters
 * @subpackage Departement_AU *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseDepartement_AUFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'      => new sfWidgetFormFilterInput(),
      'region'   => new sfWidgetFormDoctrineChoice(array('model' => 'Region_AU', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'      => new sfValidatorPass(array('required' => false)),
      'region'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Region_AU', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('departement_au_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Departement_AU';
  }

  public function getFields()
  {
    return array(
      'code_dep' => 'Number',
      'nom'      => 'Text',
      'region'   => 'ForeignKey',
    );
  }
}
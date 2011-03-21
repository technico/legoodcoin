<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Region filter form base class.
 *
 * @package    filters
 * @subpackage Region *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseRegionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'  => new sfWidgetFormFilterInput(),
      'pays' => new sfWidgetFormFilterInput(),
      'slug' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'  => new sfValidatorPass(array('required' => false)),
      'pays' => new sfValidatorPass(array('required' => false)),
      'slug' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('region_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'nom'  => 'Text',
      'pays' => 'Text',
      'slug' => 'Text',
    );
  }
}
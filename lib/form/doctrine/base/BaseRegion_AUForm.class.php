<?php

/**
 * Region_AU form base class.
 *
 * @package    form
 * @subpackage region_au
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseRegion_AUForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'  => new sfWidgetFormInputHidden(),
      'nom' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'  => new sfValidatorDoctrineChoice(array('model' => 'Region_AU', 'column' => 'id', 'required' => false)),
      'nom' => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('region_au[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region_AU';
  }

}

<?php

/**
 * Region form base class.
 *
 * @package    form
 * @subpackage region
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseRegionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'nom'  => new sfWidgetFormInput(),
      'pays' => new sfWidgetFormInput(),
      'slug' => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorDoctrineChoice(array('model' => 'Region', 'column' => 'id', 'required' => false)),
      'nom'  => new sfValidatorString(array('max_length' => 100)),
      'pays' => new sfValidatorString(array('max_length' => 2, 'required' => false)),
      'slug' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Region', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('region[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

}

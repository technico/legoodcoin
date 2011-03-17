<?php

/**
 * Departement form base class.
 *
 * @package    form
 * @subpackage departement
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseDepartementForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code_dep' => new sfWidgetFormInputHidden(),
      'nom'      => new sfWidgetFormInput(),
      'region'   => new sfWidgetFormDoctrineChoice(array('model' => 'Region', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'code_dep' => new sfValidatorDoctrineChoice(array('model' => 'Departement', 'column' => 'code_dep', 'required' => false)),
      'nom'      => new sfValidatorString(array('max_length' => 255)),
      'region'   => new sfValidatorDoctrineChoice(array('model' => 'Region')),
    ));

    $this->widgetSchema->setNameFormat('departement[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Departement';
  }

}

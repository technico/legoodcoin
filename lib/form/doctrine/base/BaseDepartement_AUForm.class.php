<?php

/**
 * Departement_AU form base class.
 *
 * @package    form
 * @subpackage departement_au
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseDepartement_AUForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code_dep' => new sfWidgetFormInputHidden(),
      'nom'      => new sfWidgetFormInput(),
      'region'   => new sfWidgetFormDoctrineChoice(array('model' => 'Region_AU', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'code_dep' => new sfValidatorDoctrineChoice(array('model' => 'Departement_AU', 'column' => 'code_dep', 'required' => false)),
      'nom'      => new sfValidatorString(array('max_length' => 255)),
      'region'   => new sfValidatorDoctrineChoice(array('model' => 'Region_AU')),
    ));

    $this->widgetSchema->setNameFormat('departement_au[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Departement_AU';
  }

}

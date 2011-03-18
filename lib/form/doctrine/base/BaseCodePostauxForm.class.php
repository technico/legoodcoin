<?php

/**
 * CodePostaux form base class.
 *
 * @package    form
 * @subpackage code_postaux
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseCodePostauxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'commune'     => new sfWidgetFormInput(),
      'codepos'     => new sfWidgetFormInput(),
      'departement' => new sfWidgetFormInput(),
      'insee'       => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => 'CodePostaux', 'column' => 'id', 'required' => false)),
      'commune'     => new sfValidatorString(array('max_length' => 50)),
      'codepos'     => new sfValidatorString(array('max_length' => 5)),
      'departement' => new sfValidatorString(array('max_length' => 50)),
      'insee'       => new sfValidatorString(array('max_length' => 10)),
    ));

    $this->widgetSchema->setNameFormat('code_postaux[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CodePostaux';
  }

}

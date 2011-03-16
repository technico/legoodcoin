<?php

/**
 * SfGuardRememberKey form base class.
 *
 * @package    form
 * @subpackage sf_guard_remember_key
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseSfGuardRememberKeyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'ip_address'   => new sfWidgetFormInputHidden(),
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => 'SfGuardUser', 'add_empty' => true)),
      'remember_key' => new sfWidgetFormInput(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => 'SfGuardRememberKey', 'column' => 'id', 'required' => false)),
      'ip_address'   => new sfValidatorDoctrineChoice(array('model' => 'SfGuardRememberKey', 'column' => 'ip_address', 'required' => false)),
      'user_id'      => new sfValidatorDoctrineChoice(array('model' => 'SfGuardUser', 'required' => false)),
      'remember_key' => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'created_at'   => new sfValidatorDateTime(array('required' => false)),
      'updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_remember_key[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardRememberKey';
  }

}

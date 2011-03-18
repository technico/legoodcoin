<?php

/**
 * SfGuardUser form base class.
 *
 * @package    form
 * @subpackage sf_guard_user
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseSfGuardUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'username'       => new sfWidgetFormInput(),
      'algorithm'      => new sfWidgetFormInput(),
      'is_active'      => new sfWidgetFormInput(),
      'is_super_admin' => new sfWidgetFormInput(),
      'salt'           => new sfWidgetFormInput(),
      'password'       => new sfWidgetFormInput(),
      'last_login'     => new sfWidgetFormDateTime(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => 'SfGuardUser', 'column' => 'id', 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 128)),
      'algorithm'      => new sfValidatorString(array('max_length' => 128)),
      'is_active'      => new sfValidatorInteger(array('required' => false)),
      'is_super_admin' => new sfValidatorInteger(array('required' => false)),
      'salt'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'password'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'last_login'     => new sfValidatorDateTime(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUser';
  }

}

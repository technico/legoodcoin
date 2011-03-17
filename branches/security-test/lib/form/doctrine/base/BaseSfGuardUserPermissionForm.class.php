<?php

/**
 * SfGuardUserPermission form base class.
 *
 * @package    form
 * @subpackage sf_guard_user_permission
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseSfGuardUserPermissionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'       => new sfWidgetFormInputHidden(),
      'permission_id' => new sfWidgetFormInputHidden(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => 'SfGuardUserPermission', 'column' => 'user_id', 'required' => false)),
      'permission_id' => new sfValidatorDoctrineChoice(array('model' => 'SfGuardUserPermission', 'column' => 'permission_id', 'required' => false)),
      'created_at'    => new sfValidatorDateTime(array('required' => false)),
      'updated_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_permission[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserPermission';
  }

}

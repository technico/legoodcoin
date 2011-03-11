<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * SfGuardUser filter form base class.
 *
 * @package    filters
 * @subpackage SfGuardUser *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseSfGuardUserFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'       => new sfWidgetFormFilterInput(),
      'algorithm'      => new sfWidgetFormFilterInput(),
      'is_active'      => new sfWidgetFormFilterInput(),
      'is_super_admin' => new sfWidgetFormFilterInput(),
      'salt'           => new sfWidgetFormFilterInput(),
      'password'       => new sfWidgetFormFilterInput(),
      'last_login'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'username'       => new sfValidatorPass(array('required' => false)),
      'algorithm'      => new sfValidatorPass(array('required' => false)),
      'is_active'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_super_admin' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'salt'           => new sfValidatorPass(array('required' => false)),
      'password'       => new sfValidatorPass(array('required' => false)),
      'last_login'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUser';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'username'       => 'Text',
      'algorithm'      => 'Text',
      'is_active'      => 'Number',
      'is_super_admin' => 'Number',
      'salt'           => 'Text',
      'password'       => 'Text',
      'last_login'     => 'Date',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
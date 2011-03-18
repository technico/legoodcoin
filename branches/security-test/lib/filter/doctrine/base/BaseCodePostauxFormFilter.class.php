<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * CodePostaux filter form base class.
 *
 * @package    filters
 * @subpackage CodePostaux *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseCodePostauxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'commune'     => new sfWidgetFormFilterInput(),
      'codepos'     => new sfWidgetFormFilterInput(),
      'departement' => new sfWidgetFormFilterInput(),
      'insee'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'commune'     => new sfValidatorPass(array('required' => false)),
      'codepos'     => new sfValidatorPass(array('required' => false)),
      'departement' => new sfValidatorPass(array('required' => false)),
      'insee'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('code_postaux_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CodePostaux';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'commune'     => 'Text',
      'codepos'     => 'Text',
      'departement' => 'Text',
      'insee'       => 'Text',
    );
  }
}
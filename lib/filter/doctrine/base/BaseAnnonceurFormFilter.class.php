<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Annonceur filter form base class.
 *
 * @package    filters
 * @subpackage Annonceur *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseAnnonceurFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mail' => new sfWidgetFormFilterInput(),
      'mdp'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mail' => new sfValidatorPass(array('required' => false)),
      'mdp'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('annonceur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Annonceur';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'mail' => 'Text',
      'mdp'  => 'Text',
    );
  }
}
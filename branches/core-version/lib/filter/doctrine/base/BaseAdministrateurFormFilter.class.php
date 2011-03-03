<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * Administrateur filter form base class.
 *
 * @package    filters
 * @subpackage Administrateur *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseAdministrateurFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'    => new sfWidgetFormFilterInput(),
      'prenom' => new sfWidgetFormFilterInput(),
      'mail'   => new sfWidgetFormFilterInput(),
      'mdp'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nom'    => new sfValidatorPass(array('required' => false)),
      'prenom' => new sfValidatorPass(array('required' => false)),
      'mail'   => new sfValidatorPass(array('required' => false)),
      'mdp'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('administrateur_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Administrateur';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'nom'    => 'Text',
      'prenom' => 'Text',
      'mail'   => 'Text',
      'mdp'    => 'Text',
    );
  }
}
<?php

/**
 * Annonceur form base class.
 *
 * @package    form
 * @subpackage annonceur
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseAnnonceurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'mail'             => new sfWidgetFormInput(),
      'mdp'              => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => 'Annonceur', 'column' => 'id', 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => 'sfGuardUser')),
      'mail'             => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'mdp'              => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('annonceur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Annonceur';
  }

}

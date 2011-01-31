<?php

/**
 * Administrateur form base class.
 *
 * @package    form
 * @subpackage administrateur
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseAdministrateurForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'nom'    => new sfWidgetFormInput(),
      'prenom' => new sfWidgetFormInput(),
      'mail'   => new sfWidgetFormInput(),
      'mdp'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorDoctrineChoice(array('model' => 'Administrateur', 'column' => 'id', 'required' => false)),
      'nom'    => new sfValidatorString(array('max_length' => 50)),
      'prenom' => new sfValidatorString(array('max_length' => 20)),
      'mail'   => new sfValidatorString(array('max_length' => 100)),
      'mdp'    => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('administrateur[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Administrateur';
  }

}

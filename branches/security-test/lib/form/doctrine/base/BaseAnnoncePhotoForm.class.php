<?php

/**
 * AnnoncePhoto form base class.
 *
 * @package    form
 * @subpackage annonce_photo
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseAnnoncePhotoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'annonce_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Annonce', 'add_empty' => true)),
      'filename'   => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => 'AnnoncePhoto', 'column' => 'id', 'required' => false)),
      'annonce_id' => new sfValidatorDoctrineChoice(array('model' => 'Annonce', 'required' => false)),
      'filename'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('annonce_photo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnnoncePhoto';
  }

}

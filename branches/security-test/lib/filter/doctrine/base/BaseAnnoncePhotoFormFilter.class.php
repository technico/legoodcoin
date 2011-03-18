<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/doctrine/BaseFormFilterDoctrine.class.php');

/**
 * AnnoncePhoto filter form base class.
 *
 * @package    filters
 * @subpackage AnnoncePhoto *
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class BaseAnnoncePhotoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'annonce_id' => new sfWidgetFormDoctrineChoice(array('model' => 'Annonce', 'add_empty' => true)),
      'filename'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'annonce_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'Annonce', 'column' => 'id')),
      'filename'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('annonce_photo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnnoncePhoto';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'annonce_id' => 'ForeignKey',
      'filename'   => 'Text',
    );
  }
}
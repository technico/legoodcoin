<?php

/**
 * CategorieTranslation form base class.
 *
 * @package    form
 * @subpackage categorie_translation
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 8508 2008-04-17 17:39:15Z fabien $
 */
class BaseCategorieTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'nom'  => new sfWidgetFormInput(),
      'lang' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorDoctrineChoice(array('model' => 'CategorieTranslation', 'column' => 'id', 'required' => false)),
      'nom'  => new sfValidatorString(array('max_length' => 200)),
      'lang' => new sfValidatorDoctrineChoice(array('model' => 'CategorieTranslation', 'column' => 'lang', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categorie_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategorieTranslation';
  }

}

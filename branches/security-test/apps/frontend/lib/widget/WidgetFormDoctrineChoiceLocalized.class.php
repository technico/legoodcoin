<?php
class WidgetFormDoctrineChoiceLocalized extends sfWidgetFormDoctrineChoice
{
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    
    $this->addRequiredOption('localization_field');
    $this->addRequiredOption('localization_value');
  }
  
  public function getChoices()
  {
    $query = Doctrine::getTable($this->getOption('model'))
              ->createQuery()
              ->where($this->getOption('localization_field').' = ?', $this->getOption('localization_value'));
    $this->setOption('query', $query);
    return parent::getChoices();
  }
}
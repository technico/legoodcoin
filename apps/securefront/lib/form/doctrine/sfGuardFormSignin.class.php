<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package form
 * @package sf_guard_user
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{
  public function configure()
  {
    parent::configure();
    $this->unsetUnusedFields();
    $this->configureWidget();   
  }
  
  protected function unsetUnusedFields()
  {
    unset($this['remember']);
  }
  
  public function configureWidget()
  {
    $this->widgetSchema['username'] = new sfWidgetFormInputHidden(); 
  } 
}
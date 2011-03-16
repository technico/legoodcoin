<?php

/**
 * sfGuardUser form.
 *
 * @package    form
 * @subpackage sfGuardUser
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {

	$this->widgetSchema['password'] = new sfWidgetFormInputPassword();
	$this->widgetSchema['password']->setLabel( 'Mot de passe' );
	$this->validatorSchema['password']->setOption( 'required', true );
	$this->validatorSchema['password']->setMessage( 'required', 'Veuillez indiquer un mot de passe.' );

	//
  	$this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
  	$this->widgetSchema['password_again']->setLabel( 'Saisir à nouveau le mot de passe' );
	$this->validatorSchema['password_again'] =  clone $this->validatorSchema['password'];
	//
    
	$this->mergePostValidator
	(
		new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'Les deux mots de passes doivent être identiques.'))
	);
	
    unset
  	( 
  	  $this['username'],
  	  $this['algorithm'],
  	  $this['salt'],
  	  $this['is_active'],
  	  $this['is_super_admin'],
  	  $this['last_login'],
  	  $this['created_at'],
  	  $this['updated_at'],
  	  $this['groups_list'],
  	  $this['permissions_list']
  	);
  }
}
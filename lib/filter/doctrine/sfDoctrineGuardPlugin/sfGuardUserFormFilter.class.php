<?php

/**
 * sfGuardUser filter form.
 *
 * @package    filters
 * @subpackage sfGuardUser *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
    unset(
      $this['algorithm'],
      $this['salt'],
      $this['password'] ,
      $this['groups_list'],
      $this['permissions_list'],
      $this['last_login'],
      $this['created_at'],
      $this['updated_at']
    );
    
    $this->widgetSchema['username']->setOption('with_empty', false);
  }
}
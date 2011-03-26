<?php

/**
 * sfGuardGroup filter form.
 *
 * @package    filters
 * @subpackage sfGuardGroup *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class sfGuardGroupFormFilter extends PluginsfGuardGroupFormFilter
{
  public function configure()
  {
    unset(
      $this['name'],
      $this['description'],
      $this['created_at'] ,
      $this['updated_at']
    );    
  }
}
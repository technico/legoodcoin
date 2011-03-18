<?php
class GeoZoneWidget extends sfWidgetFormChoice
{
  public function __construct($options = array(), $attributes = array())
  {
  	$options['choices'] = array();
    parent::__construct($options, $attributes);
  }

  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('geo_zone');
    $this->addRequiredOption('country');
    parent::configure($options, $attributes);
  }
  
  public function getChoices()
  {
  	$this->geo_zone_value = $this->getOption('geo_zone');
  	
  	$choices = array();
	if( $region = $this->isRegion( $this->getOption('geo_zone'), $this->getOption('country') ) )
  	{ 	 
  	  $choices = array
  	  ( 
  	    $this->geo_zone_value => $region->getNom(),
  	                        0 => __('All the country'),
  	    __('Sub-Regions')     => Doctrine::getTable('Departement')
  	                               ->getRecordAsArray($this->geo_zone_value),
  	  );  	
  	}
    else if( $subregion = $this->isSubRegion( $this->getOption('geo_zone'), $this->getOption('country') ) )
  	{
      $choices = array
  	  ( 
  	    $subregion->getRegion()->getId() => $subregion->getRegion()->__toString(),
  	    0 => __('All the country'),
  	    __('Sub-Regions') => Doctrine::getTable('Departement')
  	                           ->getRecordAsArray($subregion->getRegion()->getId()),
  	  ); 	 
  	}
  	else
  	{
      $choices = array
  	  ( 
  	               0  => __('All the country'),
  	    __('Regions') => Doctrine::getTable('Region')->getRecordAsArray($this->getOption('country')),
  	  ); 
  	}
	
  	return $choices;
  }
  
  public function isRegion( $geo_zone, $country_code )
  {
  	return Doctrine::getTable('Region')->createQuery('r')->where('r.id = ? and r.pays = ?', array($geo_zone, $country_code))->fetchOne();
  }

  public function isSubRegion( $geo_zone, $country_code )
  {
  	return Doctrine::getTable('Departement')->createQuery('r')->where('r.code_dep = ? and r.pays = ?', array($geo_zone, $country_code))->fetchOne();
  }  
}
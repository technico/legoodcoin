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
    parent::configure($options, $attributes);
  }
  
  public function getChoices()
  {
  	$this->geo_zone_value = $this->getOption('geo_zone');
  	
  	$choices = array();
	if( $region = $this->isRegion( $this->getOption('geo_zone') ) )
  	{ 	 
  	  $choices = array
  	  ( 
  	    $this->geo_zone_value => $region->getNom(),
  	                        0 => __('All the country'),
  	    __('Sub-Regions')     => Doctrine::getTable('Departement')
  	                               ->getRecordAsArray($this->geo_zone_value),
  	  );  	
  	}
    else if( $subregion = $this->isSubRegion( $this->getOption('geo_zone') ) )
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
  	    __('Regions') => Doctrine::getTable('Region')->getRecordAsArray(),
  	  ); 
  	}
	
  	return $choices;
  }
  
  public function isRegion( $geo_zone )
  {
  	return Doctrine::getTable('Region')->find($this->getOption('geo_zone'));
  }

  public function isSubRegion( $geo_zone )
  {
  	return Doctrine::getTable('Departement')->find($this->getOption('geo_zone'));
  }  
}
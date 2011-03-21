<?php
/**
 * Represents the current user that is interacting with the web 
 * site.
 */
class myUser extends sfGuardSecurityUser
{
  protected 
    $country,
    $lang;
  /**
   * Determine if the request is the first for the current
   * user or not.
   * 
   * This method have two behaviors :
   * (A) Set up the 'first_request' user attribute.
   * (B) Determine if the request is the first for the current
   * user or not.
   * 
   * A - To set up the 'first_request' user attribute => Call 
   * the method by passing it a boolean.
   * 
   * B - For determining if the request is the first for the 
   * current user => call the method without parameter.
   * 
   * @param boolean $boolean   A boolean
   */
  public function isFirstRequest($boolean = NULL)
  {	
    if (is_null($boolean))
    {	
      return $this->getAttribute('first_request', true);
    }
    else
    { 
      $this->setAttribute('first_request', $boolean);
    }
  }
  
  public function getCountry()
  {
  	if(!isset($this->country))
  	{
	  	$language_country = $this->getCulture();//ex: fr_FR ou en_US ou fr ou en, etc.
	  	if(false !== strstr($language_country, '_'))
	  	{
	  	  $pos = strpos($language_country, '_')+1;
	  	  if($pos < strlen($language_country))
	  	  {
	  	    $this->country = strtoupper(substr($language_country, strpos($language_country, '_')+1));
	  	  }
	  	  else
	  	  {
	  	  	$this->country = 'FR'; //Pays par défaut
	  	  }
	  	}
	  	else
	  	{
	  		$this->country = 'FR'; //Pays par défaut
	  	}
  	}
  	
  	return $this->country;
  }
  
  public function getLang()
  {
  	if(!isset($this->lang))
  	{
	  	$language_country = $this->getCulture();//ex: fr_FR ou en_US ou fr ou en, etc.
	  	if(false !== strstr($language_country, '_'))
	  	{
	  	  $pos = strpos($language_country, '_')+1;
	  	  if($pos < strlen($language_country))
	  	  {
	  	    $this->lang = strtolower(substr($language_country, 0, strpos($language_country, '_')));
	  	  }
	  	  else
	  	  {
	  	  	$this->lang = 'fr'; //Langue par défaut
	  	  } 
	  	}
	  	else
	  	{
	  		$this->lang = 'fr'; //Langue par défaut
	  	}
  	}
  	
  	return $this->lang;
  }
}

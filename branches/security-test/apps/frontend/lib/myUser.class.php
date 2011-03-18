<?php
/**
 * Represents the current user that is interacting with the web 
 * site.
 */
class myUser extends sfGuardSecurityUser
{
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
  	$language_country = $this->getCulture();//ex: fr_FR ou en_US ou fr ou en, etc.
  	if(false !== strstr($language_country, '_'))
  	{
  	  $pos = strpos($language_country, '_')+1;
  	  if($pos < strlen($language_country))
  	  {
  	    return strtoupper(substr($language_country, strpos($language_country, '_')+1));
  	  }
  	  else
  	  {
  	  	return 'FR'; //Pays par défaut
  	  }
  	}
  	else
  	{
  		return 'FR'; //Pays par défaut
  	}
  }
  
  public function getLang()
  {
  	$language_country = $this->getCulture();//ex: fr_FR ou en_US ou fr ou en, etc.
  	if(false !== strstr($language_country, '_'))
  	{
  	  $pos = strpos($language_country, '_')+1;
  	  if($pos < strlen($language_country))
  	  {
  	    return strtolower(substr($language_country, 0, strpos($language_country, '_')));
  	  }
  	  else
  	  {
  	  	return 'fr'; //Langue par défaut
  	  } 
  	}
  	else
  	{
  		return 'fr'; //Langue par défaut
  	}
  }
}

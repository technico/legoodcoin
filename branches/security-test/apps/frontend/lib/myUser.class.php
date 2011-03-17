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
}

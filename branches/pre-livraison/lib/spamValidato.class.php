<?php
class sfSpamValidator extends sfValidator
{
  public function execute (&$value, &$error)
  {
    // For max_url=2, the regexp is /http.*http/is
    $re = '/'.implode('.*', array_fill(0, $this->getParameter('max_url') + 1, 'http')).'/is';
 
    if (preg_match($re, $value))
    {
      $error = $this->getParameter('spam_error');
 
      return false;
    }
 
    return true;
  }
 
  public function initialize ($context, $parameters = null)
  {
    // Initialize parent
    parent::initialize($context);
 
    // Set default parameters value
    $this->setParameter('max_url', 2);
    $this->setParameter('spam_error', 'This is spam');
 
    // Set parameters
    $this->getParameterHolder()->add($parameters);
 
    return true;
  }
}
?>
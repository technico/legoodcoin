<?php

class securefrontConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
    $this->dispatcher->connect('request.filter_parameters', array(
      $this, 'requestFilterParameters'
    ));
    
  }
  
  public function requestFilterParameters(sfEvent $event, $parameters)
  {
    $request = $event->getSubject();
 
    if(false !== strstr($request->getHost(), 'legoodcoin'))
    {
       $request->setParameter('sf_culture', 'fr_FR');
    }
    else
    {
       $request->setParameter('sf_culture', 'en_AU');      
    }
  }     
}

<?php

/**
 * postAd actions.
 *
 * @package    legoodcoin
 * @subpackage postAd
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class postAdActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    // gets information about the current route
    $routing = sfContext::getInstance()->getRouting();
    $rule = $routing->getCurrentRouteName();

    if ($this->getUser()->hasAttribute('ad') && (false !== strstr($rule, 'edit_ad')))
    {
      if(!$this->getUser()->hasCredential('edit'))
      {
        $this->forward404();
      }
      
      // clears credentials
      // $this->getUser()->clearCredentials();
      
      $this->form = new AnnonceForm($this->getUser()->getAttribute('ad'));
      $this->form->setDefault('mail', $this->getUser()->getAttribute('mail'));
      $this->form->setDefault('name', $this->getUser()->getAttribute('name'));
    }
    else
    {
      $this->form = new AnnonceForm();
    }
    
    if ($request->isMethod('post'))
    {
      // binds the form with input values and triggers validators
      $this->form->bind( 
        $request->getParameter($this->form->getName()),
        $request->getFiles($this->form->getName()));
      
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        
        // puts the ad tied to the form into the user session
        $this->getUser()->setAttribute('ad', $this->form->getObject());
        
        // puts the user email into  the user session
        $this->getUser()->setAttribute('mail', $this->form->getValue('mail'));
        
        $this->getUser()->setAttribute('name', $this->form->getValue('name'));
        
        // saves uploaded pictures
        
        // gets user "nobody"
        $nobody = Doctrine::getTable('sfGuardUser')->findOneByUsername('nobody');
            
        // simulates authentication
        $this->getUser()->signin($nobody, false);
        
        // grants review privilege
        $this->getUser()->addCredential('review');
    
        // gets the initialization options
        $options = $this->getUser()->getOptions();
        
        $this->redirect('@'.$options['default_culture'].'_review_ad');
      }
    }
  }
  
  public function executeReview(sfWebRequest $request)
  {
    // checks access to executeReview action
    $this->forward404Unless($this->getUser()->hasCredential('review'));
    
    // clears credentials
    // $this->getUser()->clearCredentials();
    
    // checks if the "ad" still exists
    $this->forward404Unless($this->getUser()->hasAttribute('ad'));
    
    // grants edit privilege
    $this->getUser()->addCredential('edit');
    
    $this->annonce = $this->getUser()->getAttribute('ad');
    
    $this->authForm = new sfGuardFormSignin();
    if (!Doctrine::getTable('sfGuardUser')->findOneByUsername($this->getUser()->getAttribute('mail')))
    {
      $this->authForm = new sfGuardUserForm();
    }
    
    if ($request->isMethod('post'))
    {
      $parameters = $request->getParameter($this->authForm->getName());
      if ($this->authForm instanceof sfGuardFormSignin)
      {
        $parameters['username'] = $this->getUser()->getAttribute('mail');
      }
      // binds the form with input values and triggers validators
      $this->authForm->bind($parameters);
      
      if ($this->authForm->isValid())
      {
        if ($this->authForm instanceof sfGuardFormSignin) // checks auth
        {
          // signout
          // $this->getUser()->signOut();          
          // echo '<br />', 'signout';
          
          // signin
          echo 'ok auth';
        }
        else // opens an account
        {
          $this->authForm->updateObject();
          $sfGuardUser = $this->authForm->getObject();
          $sfGuardUser->setUsername($this->getUser()->getAttribute('mail'));
          $annonceur = new Annonceur();
          $annonceur->setName($this->getUser()->getAttribute('name'));
          $sfGuardUser->setProfile($annonceur);
          $sfGuardUser->save();
          
          echo 'ok open an account';
        }
        
        // save the ad
        
        
        // gets the initialization options
        $options = $this->getUser()->getOptions();

        // redirect to thank you
        $this->redirect('@'.$options['default_culture'].'_thankyou_ad');
      }
    }
  }
  
  public function executeThankyou(sfWebRequest $request)
  {
    var_dump($this->getUser()->getGuardUser() instanceof stdClass);
    echo '<br />';
    var_dump($this->getUser()->getGuardUser()->getProfile()->getMail());
  }
}
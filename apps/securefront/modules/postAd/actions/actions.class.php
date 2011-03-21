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
echo 'A';      
      // clears credentials
      // $this->getUser()->clearCredentials();
      
      $this->form = new AnnonceForm($this->getUser()->getAttribute('ad'));
      $this->form->setDefault('mail', $this->getUser()->getAttribute('mail'));
      $this->form->setDefault('name', $this->getUser()->getAttribute('name'));
    }
    else if ($this->getUser()->hasAttribute('restore_post_ad_request'))
    {  
      $parameters = $this->getUser()->getAttribute('post_ad_request_backup');
      
      $this->getUser()->getAttributeHolder()->remove('restore_post_ad_request');
echo 'restoring form param after delete picture';
      $this->form = new AnnonceForm();
      foreach($parameters as $key => &$value)
      {
        if ($key === '_csrf_token') continue;
        $this->form->setDefault($key, $value);
      }
    }
    else
    {
echo 'C';      
      $this->form = new AnnonceForm();
    }
var_dump($request->isMethod('post'));    
    if ($request->isMethod('post')||$request->isMethod('put'))
    {
echo 'D';      
      $files = $request->getFiles($this->form->getName());
      $parameters = $request->getParameter($this->form->getName());
      
      // backups params
      $this->getUser()->setAttribute('post_ad_request_backup', $parameters);
      
      // binds the form with input values and triggers validators
      $this->form->bind($parameters, $files);
      
      if ($this->form->isValid())
      {
        $this->form->updateObject();
        
        // puts the ad tied to the form into the user session
        $this->getUser()->setAttribute('ad', $this->form->getObject());
        
        // puts the user email into  the user session
        $this->getUser()->setAttribute('mail', $this->form->getValue('mail'));
        
        $this->getUser()->setAttribute('name', $this->form->getValue('name'));
        
        // save of uploaded pictures is automatically done by the form, so there is nothing to do ...
        
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
    
    // instanciates 
    $this->adForm = new AnnonceForm();

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
          // Auth checking is automatically done by the form, so there is nothing to do here ...
          $sfGuardUser = $this->authForm->getValue('user');
        }
        else // opens an account
        {
          $this->authForm->updateObject();
          $sfGuardUser = $this->authForm->getObject();
          $sfGuardUser->setUsername($this->getUser()->getAttribute('mail'));
          $annonceur = new Annonceur();         
          $annonceur->setType_annonceur('individual'); //forces type_annonceur to individual
          $sfGuardUser->setProfile($annonceur);
          $sfGuardUser->save();
        }
        
        // signout
        $this->getUser()->signOut();          
          
        // signin
        $this->getUser()->signin($sfGuardUser, false);        
        
        // save the ad
        $ad = $this->getUser()->getAttribute('ad');
        $ad->setAnnonceur($this->getUser()->getProfile());
        // add pictures
        if ($this->getUser()->hasAttribute('path_to_picture_1'))
        {
	    	$picture = new AnnoncePhoto();
	    	$picture->setFilename($this->getUser()->getAttribute('path_to_picture_1'));
	    	$picture->setAnnonce($oAnnonce);
	    	$ad->AnnoncePhoto[] = $picture;
        }  
        $ad->save();
        
        // gets the initialization options
        $options = $this->getUser()->getOptions();

        // redirect to thank you
        $this->redirect('@'.$options['default_culture'].'_thankyou_ad');
      }
    }
  }
  
  public function executeThankyou(sfWebRequest $request)
  {
    //var_dump($this->getUser()->getGuardUser()->getUsername());
    //var_dump($this->getUser()->getGuardUser()->getProfile()->getType_annonceur());
    $this->getUser()->getAttributeHolder()->clear();
  }
  
  public function executeDeletePicture(sfWebRequest $request)
  { 
	$this->forward404Unless($this->getUser()->hasAttribute('path_to_picture_1'));
	
	$sf_uploads_dir = sfConfig::get('sf_upload_dir');
	  
	$filename     = $this->getUser()->getAttribute('path_to_picture_1');
	$orginalPath  = $sf_uploads_dir.DIRECTORY_SEPARATOR.'#'.$filename;
    $s468x480Path = $sf_uploads_dir.DIRECTORY_SEPARATOR.'468x480'.$filename;
  	$s80x80Path   = $sf_uploads_dir.DIRECTORY_SEPARATOR.'80x80'.$filename;
  	
	if (unlink($orginalPath) && unlink($s468x480Path) && unlink($s80x80Path))
	{
	  $this->getUser()->getAttributeHolder()->remove('path_to_picture_1');
	}

	$options = $this->getUser()->getOptions();
	
	$this->getUser()->setAttribute('restore_post_ad_request', true);
	$this->redirect('@'.$options['default_culture'].'_post_ad');
  }
}
<?php

/**
 * depotPart2b actions.
 *
 * @package    legoodcoin
 * @subpackage depotPart2b
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */

class depotPart2bActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeAuth(sfWebRequest $request)
  {
    $sUsername  = $this->getUser()->getAttribute( 's_mail_annonceur' );
	$sPassword  = $request->getParameter( 'auth_password' );
  
	// user exists?
    if($user = Doctrine::getTable('sfGuardUser')->findOneByUsername($sUsername))
    {

      // password is ok?
      if($user->checkPassword($sPassword))
      {
    	$oAnnonceur = $user->getAnnonceur();
    	$oAnnonceur = $oAnnonceur[0];
    	$oAnnonce = $this->getUser()->getAttribute( 'o_annonce' );
    	$oAnnonce->setAnnonceur( $oAnnonceur );
    	
		if( $this->getUser()->hasAttribute( 'o_photo_1' ) ):
	    	$oAnnoncePhoto = new AnnoncePhoto();
	    	$oAnnoncePhoto->setFilename( $this->getUser()->getAttribute( 'o_photo_1' ) );
	    	$oAnnoncePhoto->setAnnonce($oAnnonce);
	    	$oAnnonce->AnnoncePhoto[] = $oAnnoncePhoto;
		endif;  	

//Si ça marche c'est un petit pas pour l'humanité mais un grand pas pour moi !
$oAnnonce->setId(null);
$oAnnonce->setPays($this->getUser()->getCountry());
$oAnnonce->save();

if( $this->getUser()->hasAttribute( 'id_annonce_to_delete' ) )
{
	$oToDeleteAnnonce = Doctrine::getTable
	( 'Annonce' )
	->find( $this->getUser()->getAttribute( 'id_annonce_to_delete' ) );
	$oToDeleteAnnonce->delete();
	$this->getUser()->getAttributeHolder()->remove( 'id_annonce_to_delete' );
}
        $this->redirect( 'depotPart3/index' );
      }
    }	

    $this->bHasErrors = true;
    $this->setTemplate( 'index' );
  }
}
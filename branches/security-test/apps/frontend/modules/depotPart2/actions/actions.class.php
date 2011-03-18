<?php

/**
 * depotPart2 actions.
 *
 * @package    legoodcoin
 * @subpackage depotPart2
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class depotPart2Actions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->oForm = new sfGuardUserForm();
    //$this->oForm->setDefault( 'username', $this->getUser()->getAttribute( 's_mail_annonceur' ) );
  }
  
  public function executeCreate(sfWebRequest $request)
  {
  	$this->oForm = new sfGuardUserForm();
  	$aAnnonceParameter = $request->getParameter( $this->oForm->getName() );

    $this->oForm->bind( $aAnnonceParameter );
    if( $this->oForm->isValid() )
    {
    	$this->oForm->updateObject();
    	//
    	$oSfGuardUser = $this->oForm->getObject();
    	$oSfGuardUser->setUsername( $this->getUser()->getAttribute( 's_mail_annonceur' ) );
//var_dump( $oSfGuardUser->getPassword() );    	
    	//
    	
    	//
    	$oAnnonceur = new Annonceur();
    	$oAnnonceur->setSfGuardUser( $oSfGuardUser );
    	//
    	
    	//
    	$oAnnonce = $this->getUser()->getAttribute( 'o_annonce' );
    	$oAnnonce->setAnnonceur( $oAnnonceur );
    	//
    	
    	//Si ça marche c'est un petit pas pour l'humanité mais un grand pas pour moi !
$oAnnonce->setPays($this->getUser()->getCountry());
$oAnnonce->save();
//var_dump( 'yep' );
    	//Mettre l'objet Annonce (il faut l'extraire de l'objet AnnonceForm, précédé d'un updateObject)
    	//il faut stocker le mail en session aussi
    	//Puis on redirige ver depotPart2 ... wai and see
    	$this->redirect( 'depotPart3/index' );
    }
    $this->setTemplate( 'index' );
  }
}
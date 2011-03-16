<?php

/**
 * depot actions.
 *
 * @package    legoodcoin
 * @subpackage depot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class depotActions extends sfActions
{
	protected function processForm( sfWebRequest $oRequest, sfForm $oForm )
	{
		$oForm->bind( $oRequest->getParameter( $oForm->getName() )/*, $oRequest->getFiles( $oForm->getName() )*/ );
//var_dump(  $oRequest->getParameter( $oForm->getName() ) );

		$this->getUser()->setAttribute( $oForm->getName(), $oRequest->getParameter( $oForm->getName() )/*, $oRequest->getFiles( $oForm->getName() )*/ );
		
		if( $oForm->isValid() )
		{
			return true;
		}
		
		return false;
	}

	protected function initForms()
	{
		$oSfGuardUserForm = new sfGuardUserForm();
		$oAnnonceurForm   = new AnnonceurForm();
		$this->oForm      = new AnnonceForm();
		$this->oForm->mergeForm( $oAnnonceurForm );
		$this->oForm->mergeForm( $oSfGuardUserForm );
	}
	
	protected function addFakeParameters(sfWebRequest $oRequest)
	{
		$aAnnonce = $oRequest->getParameter( 'annonce' );
		$aAnnonce[ 'sf_guard_user_id' ] = 2;
		$oRequest->setParameter( 'annonce', $aAnnonce );
	}
	
	public function executeIndex(sfWebRequest $request)
	{
		$this->initForms();
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->initForms();
		$this->addFakeParameters( $request );
		
		$bIsFormValid = $this->processForm( $request, $this->oForm );
		if( !$bIsFormValid ) $this->setTemplate( 'index' );
		else 
		{ 
			$this->oForm->updateObject();
			$this->oForm->getObject();
			exit(0);
			//$this->redirect( 'depot/previsu' ); 
		}
	}
	
	public function executePrevisu(sfWebRequest $request)
	{
		$this->aAnnonce = $this->getUser()->getAttribute( 'annonce' );
		$this->aAnnonce[ 'region' ] = Doctrine::getTable( 'Region' )->find( $this->aAnnonce[ 'region' ] )->getNom();
		$this->aAnnonce[ 'categorie' ] = Doctrine::getTable( 'Categorie' )->find( $this->aAnnonce[ 'categorie' ] )->getNom();
		$a = Doctrine::getTable( 'sfGuardUser' )->findByDql( 'username = ?', $this->aAnnonce[ 'username' ] );
		if( count($a) === 0)
		{
			echo '<h3>new</h3>';
			$oGuardUser = new sfGuardUser();
			$oGuardUser->setUsername( $this->aAnnonce[ 'username' ] );
			$this->oUserForm = new sfGuardUserForm( $oGuardUser );

		}
		else 
		{
			exit( 'auth' );
		}
	}
	
	public function executeAccountCreate(sfWebRequest $request)
	{
		$this->aAnnonce = $this->getUser()->getAttribute( 'annonce' );
		$this->aAnnonce = $this->getUser()->getAttribute( 'annonce' );
		$this->aAnnonce[ 'region' ] = Doctrine::getTable( 'Region' )->find( $this->aAnnonce[ 'region' ] )->getNom();
		$this->aAnnonce[ 'categorie' ] = Doctrine::getTable( 'Categorie' )->find( $this->aAnnonce[ 'categorie' ] )->getNom();
		$a = Doctrine::getTable( 'sfGuardUser' )->findByDql( 'username = ?', $this->aAnnonce[ 'mail' ] );
				
		$oGuardUser = new sfGuardUser();
		$oGuardUser->setUsername( $this->aAnnonce[ 'mail' ] );
		$this->oUserForm = new sfGuardUserForm( $oGuardUser );
		$aPar = $request->getParameter( $this->oUserForm->getName() );
		$aPar['username'] = $this->aAnnonce[ 'mail' ];
		$request->setParameter( $this->oUserForm->getName(), $aPar );
		$bIsFormValid = $this->processForm( $request, $this->oUserForm );
		if( $bIsFormValid )
		{
			$oAnnonceForm = new AnnonceForm();
			$oAnnonceForm->bind( $this->getUser()->getAttribute( 'annonce' ) );
			$oAnnonceur = new Annonceur();
			$this->oUserForm->updateObject();
			$oAnnonceur->setSfGuardUser( $oGuardUser );
			//var_dump($oAnnonceur->getSfGuardUser()->getPassword());
			$oAnnonceForm->getObject()->setAnnonceur( $oAnnonceur );
			$oAnnonceForm->save();		
		} else echo 'ko';
		$this->setTemplate( 'previsu' );
	}
	
	public function executeEdit(sfWebRequest $request)
	{
		$this->oForm = new AnnonceForm();
		//$this->oFormAnnonceur = new AnnonceurForm();
		//$this->oForm->mergeForm( $this->oFormAnnonceur );
		
		$this->oForm->bind( $this->getUser()->getAttribute( $this->oForm->getName() ) );
		
		$this->setTemplate( 'index' );
	}

	public function executeMerci(sfWebRequest $request)
	{
		$this->getUser()->getAttributeHolder()->remove( 's_mail_annonceur' );
		$this->getUser()->getAttributeHolder()->remove( 'o_annonce' );
	}

}
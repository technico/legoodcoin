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

		$this->getUser()->setAttribute( $oForm->getName(), $oRequest->getParameter( $oForm->getName() )/*, $oRequest->getFiles( $oForm->getName() )*/ );
		
		if( $oForm->isValid() )
		{
			return true;
		}
		
		return false;
	}

	/**
	 * Executes index action
	 *
	 * @param sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->oForm = new AnnonceForm();
		$this->oFormAnnonceur = new AnnonceurForm();
		$this->oForm->mergeForm( $this->oFormAnnonceur );
	}

	public function executeCreate(sfWebRequest $request)
	{
		$this->oForm = new AnnonceForm();
		$this->oFormAnnonceur = new AnnonceurForm();
		$this->oForm->mergeForm( $this->oFormAnnonceur );
		
		$bIsFormValid = $this->processForm( $request, $this->oForm );
		if( !$bIsFormValid ) $this->setTemplate( 'index' );
		else $this->forward( 'depot', 'previsu' );
	}

	public function executeEdit(sfWebRequest $request)
	{
		$this->oForm = new AnnonceForm();
		$this->oFormAnnonceur = new AnnonceurForm();
		$this->oForm->mergeForm( $this->oFormAnnonceur );
		
		$this->oForm->bind( $this->getUser()->getAttribute( $this->oForm->getName() ) );
		
		$this->setTemplate( 'index' );
	}
	
	public function executePrevisu(sfWebRequest $request)
	{
		/*
		$this->oForm = new AnnonceForm();
		$this->oFormAnnonceur = new AnnonceurForm();
		$this->oForm->mergeForm( $this->oFormAnnonceur );
		
		$this->oForm->bind( $this->getUser()->getAttribute( $this->oForm->getName() ) );
		$this->oForm->updateObject();
		$this->Annonce = $this->oForm->getObject();
		$this->Annonce->setDate_control( '1970-01-01 01:01:01' );
		$this->bPreview = true;
		*/
		
		//$this->setTemplate( 'index', 'detail' );
		$this->aAnnonce = $this->getUser()->getAttribute( 'annonce' );
		$this->aAnnonce[ 'region' ] = Doctrine::getTable( 'Region' )->find( $this->aAnnonce[ 'region' ] )->getNom();
		$this->aAnnonce[ 'categorie' ] = Doctrine::getTable( 'categorie' )->find( $this->aAnnonce[ 'categorie' ] )->getNom();
		
	}

	public function executeMerci(sfWebRequest $request)
	{
		//Attention deux rechargements de la page produisent deux insert en base ! => A coriger
		//Comment nettoyer la session ?
		$this->oForm = new AnnonceForm();
		$this->oFormAnnonceur = new AnnonceurForm();
		$this->oForm->mergeForm( $this->oFormAnnonceur );
		$this->oForm->bind( $this->getUser()->getAttribute( $this->oForm->getName() ) );
		$this->oForm->save();
		$this->getUser()->getAttributeHolder()->remove( $this->oForm->getName() );
	}
}
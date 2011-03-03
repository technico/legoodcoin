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
		
		if($request->isMethod('post'))
	    {
	      $this->oForm->bind($request->getParameter('annonce'));
	      //echo var_export( $request->getParameter('annonce'), true );
	      if($this->oForm->isValid())
	      {
	      	$aAnnonces = $request->getParameter('annonce');
			$this->sTypeAnnonce = $aAnnonces['type_annonce'];
			$this->sTitre       = $aAnnonces['titre'];
			$this->sContenu     = $aAnnonces['contenu'];
			$this->sVille       = $aAnnonces['ville'];
			$this->sCodePostal  = $aAnnonces['code_postal'];
			$this->sPrix        = $aAnnonces['prix'];
			$this->sTel         = $aAnnonces['telephone'];

	        $this->getUser()->setAttribute('annonce', $aAnnonces);
	        $this->setTemplate('previsu');
	      }
	    }
	}
	
	public function executePrevisu(sfWebRequest $request)
	{
		$this->sTypeAnnonce = $request->getParameter('type_annonce');
		$this->sTitre       = $request->getParameter('titre');
		$this->sContenu     = $request->getParameter('contenu');
		$this->sVille       = $request->getParameter('ville');
		$this->sCodePostal  = $request->getParameter('code_postal');
		$this->sPrix        = $request->getParameter('prix');
		$this->sTel         = $request->getParameter('telephone');
	}
	
	public function executeMerci(sfWebRequest $request)
	{
		$this->oForm          = new AnnonceForm();
		$this->oFormAnnonceur = new AnnonceurForm();
		$this->oForm->mergeForm( $this->oFormAnnonceur );
		
		$this->oForm->bind( $this->getUser()->getAttribute( 'annonce' ) );
		
		if( $this->oForm->isValid() )
	    {
	    	$this->oForm->save();
	    }
	}
}
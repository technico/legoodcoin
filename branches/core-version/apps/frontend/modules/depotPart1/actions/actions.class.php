<?php

/**
 * depotPart1 actions.
 *
 * @package    legoodcoin
 * @subpackage depotPart1
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class depotPart1Actions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->oForm = new AnnonceForm();
  }
  
  public function executeCreate(sfWebRequest $request)
  {
  	$this->oForm = new AnnonceForm();
  	$aAnnonceParameter = $request->getParameter( $this->oForm->getName() );
    
    $this->oForm->bind( $aAnnonceParameter, $request->getFiles( $this->oForm->getName() ) );
    if( $this->oForm->isValid() )
    {
    	//Mettre l'objet Annonce (il faut l'extraire de l'objet AnnonceForm, précédé d'un updateObject)
    	//il faut stocker le mail en session aussi
    	//Puis on redirige ver depotPart2 ... wai and see
    	$this->oForm->updateObject();
    	$oAnnonce = $this->oForm->getObject();

    	$this->getUser()->setAttribute( 's_mail_annonceur', $aAnnonceParameter[ 'mail' ] );
    	$this->getUser()->setAttribute( 'o_annonce', $oAnnonce );
    	
    	$oTab = Doctrine::getTable( 'sfGuardUser' )->findByDql( 'username = ?', $aAnnonceParameter[ 'mail' ] );
    	$bUserExists = count( $oTab ) > 0;
    	if( $bUserExists )
    	{
    		$this->redirect( 'depotPart2b/index' );
    	}
    	else
    	{
    		$this->redirect( 'depotPart2/index' );
    	}
    }
    $this->setTemplate( 'index' );
  }

	public function executeEdit(sfWebRequest $request)
	{
		$this->oForm = new AnnonceForm( $this->getUser()->getAttribute( 'o_annonce' ) );
		$this->oForm->setDefault( 'mail', $this->getUser()->getAttribute( 's_mail_annonceur' ) );
		$this->setTemplate( 'index' );
	}  
}

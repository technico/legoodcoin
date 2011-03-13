<?php

/**
 * detail actions.
 *
 * @package    legoodcoin
 * @subpackage detail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class detailActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {   
      $this->Annonce = Doctrine::getTable('Annonce')->find( $request->getParameter( 'id' ) );
      $this->backref = Backref::getBackdef( $request );
      
  }
  
  public function executeSupprimer(sfWebRequest $request)
  {   
      $this->id  = $request->getParameter( 'id' ); //Si false faire un 404 forward

      if($request->isMethod( 'post' ) )
      {
     	  $mdp = $request->getParameter( 'mdp' );
	      $oAnnonce = Doctrine::getTable('Annonce')->find( $this->id );
	      $this->bAuth = Doctrine::getTable('sfGuardUser')->find
	      ( 
	      	$oAnnonce->getAnnonceur()->getSfGuardUser()->getId() 
	      )
	      ->checkPassword( $mdp );
	      
	      if( $this->bAuth )
	      {
	      	$oAnnonce->setEtat_de_validation( 'udeleted' ); //supprimer par le user
	      	$oAnnonce->save();
	      	$this->redirect( 'detail/suppressionOK');
	      }
      }
  }
  
  public function executeSuppressionOK(sfWebRequest $request)
  {   

  }
  
	public function executeModifier(sfWebRequest $request)
	{
		$this->id  = $request->getParameter( 'id' ); //Si false faire un 404 forward
		$oAnnonce = Doctrine::getTable('Annonce')->find( $this->id );
		
		$s_mail_annonceur = Doctrine::getTable('sfGuardUser')->find
	    ( 
	    	$oAnnonce->getAnnonceur()->getSfGuardUser()->getId() 
	    )
	    ->getUsername();

	    $this->getUser()->setAttribute( 'id_annonce_to_delete', $oAnnonce->getId() ) ;
		$this->getUser()->setAttribute( 's_mail_annonceur', $s_mail_annonceur );
		
		$aPhotoannonces = $oAnnonce->getAnnoncePhoto();
		if( count( $aPhotoannonces ) > 0 )
		{
			$this->getUser()->setAttribute( 'o_photo_1', $aPhotoannonces[0]->getFilename() );
		}
		$oAnnonce->setId(null);
	    $this->getUser()->setAttribute( 'o_annonce', $oAnnonce ) ;
		$this->forward( 'depotPart1', 'edit' );
	} 
}

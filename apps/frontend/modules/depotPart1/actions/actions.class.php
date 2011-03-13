<?php
require_once 'C:\development\sfprojets\legoodcoin\lib\vendor\symfony\lib\validator\sfValidatorFile.class.php';
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
    $this->getUser()->getAttributeHolder()->remove( 'o_photo_1' );
  }
  
  public function executeCreate(sfWebRequest $request)
  {  	 
  	$this->oForm = new AnnonceForm();

  	if( $request->isMethod('post') )
  	{
  		$aAnnonceParameter = $request->getParameter( $this->oForm->getName() );
    
  		$aFiles = $request->getFiles( $this->oForm->getName() );
  		
		$this->getUser()->setAttribute
		(
			$this->oForm->getName(), 
			$aAnnonceParameter
		);
		
		$this->getUser()->setAttribute
		(
			$this->oForm->getName().'_Fileparams', 
			$aFiles
		);
		$this->oForm->bind( $aAnnonceParameter, $aFiles );
//On valide d'abord la photo
    if( false === $this->oForm[ 'photo_1' ]->hasError() )
    {
    	//Pas d'erreur sur la photo
    	
    	if( !empty( $aFiles["photo_1"]["name"] ) )
    	{
    		$oFile = new sfValidatedFile($aFiles["photo_1"]["name"], $aFiles["photo_1"]["type"], $aFiles["photo_1"]["tmp_name"], $aFiles["photo_1"]["size"], $path = null);
//echo 'Pas d\'erreur sur la photo';
			$sFilename = $oFile->generateFilename();
			$sOrginalPath = sfConfig::get( 'sf_web_dir' ).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'#'.$sFilename;
			$oFile->save( $sOrginalPath );
			
			$s468x480Path = sfConfig::get( 'sf_web_dir' ).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'468x480'.$sFilename;
			$s80x80Path   = sfConfig::get( 'sf_web_dir' ).DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'80x80'.$sFilename;
    		
			$thumbnail = new sfThumbnail( 468, 480 );
			$thumbnail->loadFile( $sOrginalPath );
			$thumbnail->save( $s468x480Path );

			$thumbnail = new sfThumbnail( 80, 60 );
			$thumbnail->loadFile( $sOrginalPath );
			$thumbnail->save( $s80x80Path ); 
/*echo '<pre>';
var_dump
( 
	$oFile->generateFilename(),
	$oFile->getExtension(),
	$oFile->getOriginalExtension(),
	$oFile->getOriginalName(),
	$oFile->getPath(),
	$oFile->getSavedName(),
	$oFile->getTempName()
);
echo '</pre>';*/		
    		$this->getUser()->setAttribute( 'o_photo_1', $sOrginalPath );
    	}
    }
    //END
  	}
  	else
  	{
  		$aAnnonceParameter =  $this->getUser()->getAttribute( $this->oForm->getName(), array() );
  		$aFiles = $this->getUser()->getAttribute( $this->oForm->getName().'_Fileparams', array() );
  	}
  	
    

	
    
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
	
	public function executeDeletePhoto(sfWebRequest $request)
	{
		if( $this->getUser()->hasAttribute( 'o_photo_1' ) )
		{
		  if
		  ( 
		  	unlink( $this->getUser()->getAttribute( 'o_photo_1' ) ) &&
		  	unlink( str_replace( '#', '80x80', $this->getUser()->getAttribute( 'o_photo_1' ) ) ) &&
		  	unlink( str_replace( '#', '468x480', $this->getUser()->getAttribute( 'o_photo_1' ) ) )
		  )
		  {
		  	$this->getUser()->getAttributeHolder()->remove( 'o_photo_1' );
		  }  
		}
		$this->redirect( 'depotPart1/create' );
	}
}
<?php
class ValidatorFile extends sfValidatorFile
{
  protected function doClean($value)
  {
    $sf_uploads_dir = sfConfig::get('sf_upload_dir');
    
    $file        = parent::doClean($value);
  	$filename    = $file->generateFilename();
  	$orginalPath = $sf_uploads_dir.DIRECTORY_SEPARATOR.'#'.$filename;
  	
  	$file->save($orginalPath);
  	
  	$s468x480Path   = $sf_uploads_dir.DIRECTORY_SEPARATOR.'468x480'.$filename;
  	$s80x80Path     = $sf_uploads_dir.DIRECTORY_SEPARATOR.'80x80'.$filename;
  		
  	$thumbnail = new sfThumbnail(468, 480);
  	$thumbnail->loadFile($orginalPath);
  	$thumbnail->save($s468x480Path);
  
  	$thumbnail = new sfThumbnail(80, 60);
  	$thumbnail->loadFile($orginalPath);
  	$thumbnail->save($s80x80Path); 
  
  	sfContext::getInstance()->getUser()->setAttribute('path_to_picture_1', $filename);
 	
  	return $file;
  }
}
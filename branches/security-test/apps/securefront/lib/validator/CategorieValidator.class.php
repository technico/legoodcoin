<?php
class CategorieValidator extends sfValidatorDoctrineChoice
{
  protected function doClean($value)
  {
  	try
  	{
  	  $value = parent::doClean($value);
  	}
    catch(Exception $ex)
  	{
  	  $value = "";
  	}
  	return $value;
  }	
}
?>
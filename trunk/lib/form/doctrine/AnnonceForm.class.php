<?php

/**
 * Annonce form.
 *
 * @package    form
 * @subpackage Annonce
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class AnnonceForm extends BaseAnnonceForm
{
  public function configure()
  {
  	unset( 
  		$this['date_control'],
  		$this['validee_par'],
  		$this['annonceur'],
  		$this['est_abusif'],
  		$this['contenu'],
  		$this['telephone'],
  		$this['prix'],
  		$this['etat_de_validation'],
  		$this['ville'],
  		$this['code_postal'],
  		$this['type_annonce'],
  		$this['categorie'],
  		$this['region'],
  		$this['departement']
  	);
  }
}
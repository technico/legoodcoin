<?php

/**
 * Annonce filter form.
 *
 * @package    filters
 * @subpackage Annonce *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class AnnonceFormFilter extends BaseAnnonceFormFilter
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
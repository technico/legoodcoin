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
  protected 
    $geo_zone_value,
  	$only_title,
  	$country;
  
  public function __construct( $geo_zone_value = 0, $only_title = 0, $country )
  {
    $this->geo_zone_value = $geo_zone_value;
    $this->only_title = $only_title;  
    $this->country = $country;
    
    parent::__construct();
  }
  
  public function configure()
  {
  	unset( 
  	  $this['nom_annonceur'],
  	    $this['slug'],
  		$this['date_control'],
  		$this['validee_par'],
  		$this['annonceur'],
  		$this['est_abusif'],
  		//$this['contenu'],
  		$this['telephone'],
  		$this['prix'],
  		//$this['etat_de_validation'],
  		$this['ville'],
  		$this['code_postal'],
  		//$this['type_annonce'],
        //$this['categorie'],
  		$this['region'],
  		$this['departement'],
  		$this['titre']
  	);
  	
  	$this->validatorSchema['only_title'] = new sfValidatorPass();
  	
  	$this->widgetSchema['pays']    = new sfWidgetFormInputHidden();
  	$this->validatorSchema['pays'] = new sfValidatorPass();
  	
  	$this->widgetSchema['etat_de_validation']    = new sfWidgetFormInputHidden();
	$this->validatorSchema['etat_de_validation'] = new sfValidatorPass();
    $this->widgetSchema['type_annonce']    = new sfWidgetFormInputHidden();
	$this->validatorSchema['type_annonce'] = new sfValidatorPass();  	
	
  	
  	$this->widgetSchema['contenu']->setOption('with_empty', false);
  	$this->widgetSchema['contenu']->setOption('is_hidden', true);
  	$this->widgetSchema['contenu']->setOption('template', '%input% %empty_checkbox% %empty_label%');
    $this->widgetSchema['categorie']->setOption('is_hidden', true);
  	$this->validatorSchema['categorie'] = new CategorieValidator(array('required' => false, 'model' => 'Categorie', 'column' => 'id'));
  	
  	/* 
  	 * Special widget that allows the choice of regions or sub-regions
  	 * within the same select box.
  	 */  	  
  	$this->widgetSchema['geo_zone']   = new GeoZoneWidget(array('country'=>$this->country, 'geo_zone'=>$this->geo_zone_value, 'is_hidden' => true));
  	$this->validatorSchema['geo_zone'] = new sfValidatorPass();
  }
 
  //Adding the "geo_zone" virtual field
  public function getFields()
  {
  	$fields = parent::getFields();
  	$fields['geo_zone']   = 'ForeignKey';
    return $fields;
  }
  
  //Adding a custom query for "geo_zone" virtual fields
  public function addGeoZoneColumnQuery($query, $field, $values_field)
  {
  	if($values_field != '0')
  	{
  	  $query->addWhere( '(region = ? or departement = ?)', array( $values_field, $values_field) );
  	}
  }

  public function addContenuColumnQuery($query, $field, $values_field)
  {
    if($this->only_title)
  	{
  	   return $query->addWhere('titre LIKE ?', "%{$values_field['text']}%");
  	}
  	
  	return $query->addWhere('(titre LIKE ? or contenu LIKE ?)', array("%{$values_field['text']}%", "%{$values_field['text']}%"));
  }
  

  public function addTypeAnnonceColumnQuery($query, $field, $values_field)
  {
    if(!empty($values_field) )
  	{
  		$query->andWhere('type_annonce = ?', $values_field);
  	}
  }
  
  public function addEtatDeValidationColumnQuery($query, $field, $values_field)
  {
  	if(!empty($values_field) )
  	{
  		$query->andWhere('etat_de_validation = ?', $values_field);
  	}
  	return $query;
  }

  public function addPaysColumnQuery($query, $field, $values_field)
  {
  	if(!empty($values_field) )
  	{
  		$query->andWhere('pays = ?', $values_field);
  	}
  	return $query;
  }
  	
  public function buildQuery(array $values)
  {
  	$query = parent::buildQuery($values);
  	$query->orderBy('date_control DESC');
  	return $query;
  }
}
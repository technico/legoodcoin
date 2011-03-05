<?php

/**
 * Annonceur form.
 *
 * @package    form
 * @subpackage Annonceur
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class AnnonceurForm extends BaseAnnonceurForm
{
  public function configure()
  {
  	$this->validatorSchema['mail']->setMessage( 'required', 'Veuillez indiquer votre mail.' );
  	$this->validatorSchema['mdp']->setMessage( 'required', 'Veuillez renseigner un mot de passe.' );
  }
}
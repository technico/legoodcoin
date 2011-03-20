<?php

/**
 * postAd actions.
 *
 * @package    legoodcoin
 * @subpackage postAd
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class postAdActions extends sfActions
{
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AnnonceForm();
  }
}

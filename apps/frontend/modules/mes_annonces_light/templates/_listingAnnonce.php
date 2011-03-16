<?php
  	    foreach( $a->getAnnonce() as $oAn )
  	    {
  	    	if( $oAn->getEtat_de_validation() != 'accepted' ) continue;
  	   		echo $oAn->getTitre(), "\n\r", 'detail/index?id='.$oAn->getId(), "\n\r",  "\n\r";
  	    }
?>
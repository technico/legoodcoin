<?php
class AnnonceTable extends Doctrine_Table
{
    /**
     * Retourne le premier item de la collection d'objets Annonce
     * dont l'état de validation est à "wait".
     * 
     * @return mixed Annonce ou false si pas d'objets.
     */
	public function findWait() {
		$oQuery = self::createQuery();
		$oQuery->where( 'etat_de_validation = ?' );
		$oQuery->limit( 1 );
		
		$oAnnonce = $oQuery->fetchOne( array( 'wait' ) );
		
		$oQuery->free();
		
		return $oAnnonce;
	}
}
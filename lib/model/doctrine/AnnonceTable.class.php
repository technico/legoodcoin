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

	public function findI18n($id)
	{
      return Doctrine::getTable('Annonce')
        ->createQuery('a')
        ->innerJoin('a.Categorie c')
        ->innerJoin('c.Translation t WITH t.lang = ?', 'en')
        ->where('a.id = ?', $id)->fetchOne();		
	}
}
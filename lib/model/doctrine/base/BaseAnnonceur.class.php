<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseAnnonceur extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('annonceur');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('sf_guard_user_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('type_annonceur', 'string', 12, array(
             'type' => 'string',
             'length' => '12',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id',
             'onDelete' => 'cascade'));

        $this->hasMany('Annonce', array(
             'local' => 'id',
             'foreign' => 'annonceur'));
    }
}
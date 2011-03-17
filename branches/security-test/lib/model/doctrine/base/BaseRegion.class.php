<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseRegion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('region');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('nom', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '100',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('Annonce', array(
             'local' => 'id',
             'foreign' => 'region'));

        $this->hasMany('Departement', array(
             'local' => 'id',
             'foreign' => 'region'));
    }
}
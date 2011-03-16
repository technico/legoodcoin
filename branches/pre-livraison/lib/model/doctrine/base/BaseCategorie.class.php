<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseCategorie extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('categorie');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('nom', 'string', 200, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '200',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasMany('Annonce', array(
             'local' => 'id',
             'foreign' => 'categorie'));
    }
}
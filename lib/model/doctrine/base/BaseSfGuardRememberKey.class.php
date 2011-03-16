<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseSfGuardRememberKey extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_remember_key');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('ip_address', 'string', 50, array(
             'type' => 'string',
             'primary' => true,
             'length' => '50',
             ));
        $this->hasColumn('user_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('remember_key', 'string', 32, array(
             'type' => 'string',
             'length' => '32',
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'length' => '25',
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'length' => '25',
             ));
    }

    public function setUp()
    {
        parent::setUp();
    $this->hasOne('SfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}
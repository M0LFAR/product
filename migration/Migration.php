<?php
use components\Db;

abstract class Migration
{
    public $db;

    abstract function createTable();
    abstract function createKey();
    abstract function createTrigger();
    abstract function createProcedure();

    abstract function dropProcedure();
    abstract function dropTrigger();
    abstract function dropKey();
    abstract function dropTable();

    function  __construct(){
        $this->db = Db::getConnection();
    }

    public function  migrateUP(){
        $a = $this->createTable();
        $this->createKey();
        $this->createTrigger();
        $this->createProcedure();
    }


    function migrateDOWN(){
        $this->dropProcedure();
        $this->dropTrigger();
        $this->dropKey();
        $this->dropTable();
    }
}
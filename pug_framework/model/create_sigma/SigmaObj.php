<?php
/**
 * @after create Table
 */
use Pug_Framework\Model\Db_Config\Database;

$SigmaTable = new class extends Database
{
    private $create = [];
    /**
     * @return void
     */
    public function createUserTable(): void
    {
        $this->openConnect();
        $this->closeConnect();
    }

};

$createTable = new $SigmaTable();

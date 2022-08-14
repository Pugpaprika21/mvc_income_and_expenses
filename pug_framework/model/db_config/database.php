<?php

namespace Pug_Framework\Model\Db_Config;

use PDO;
use PDOException;

class Database
{
    /**
     * @var [string]
     * @var string $server
     * @var string $username
     * @var string $password
     * @var string $dbname
     * 
     * @var object $conn 
     */
    private $server;
    private $username;
    private $password;
    private $dbname;

    public $conn;
    /**
     * @method object construct()
     * @return object
     */
    public function __construct()
    {
        $this->server = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "mvc_income_and_expenses";
    }
    /**
     * @return object
     */
    public function openConnect(): object
    {
        try {
            $this->conn = new PDO("mysql:host={$this->server};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $err) {
            return (object)['status' => 500, 'massage' => $err->getMessage()];
        }
    }
    /**
     * @return void
     */
    public function closeConnect(): void
    {
        $this->conn = null;
    }
}

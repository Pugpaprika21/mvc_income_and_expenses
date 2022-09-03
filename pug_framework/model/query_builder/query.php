<?php

namespace Pug_Framework\Model\Query_Builder;

use Pug_Framework\Model\Db_Config\Database;
use PDO;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

final class Query
{
    use TraitQuery;
    /**
     * @var object $pdo_conn
     * @var object $pdo_close
     * @var array $response
     */
    private $pdo_conn;
    private $pdo_close;
    private $response;

    private const FETCH_TYPE = [
        'FETCH_ASSOC' => PDO::FETCH_ASSOC,
        'FETCH_BOTH' => PDO::FETCH_BOTH,
        'FETCH_LAZY' => PDO::FETCH_LAZY,
        'FETCH_NAMED' => PDO::FETCH_NAMED,
        'FETCH_NUM' => PDO::FETCH_NUM,
        'FETCH_OBJ' => PDO::FETCH_OBJ
    ];
    /**
     * @return object
     */
    public function __construct()
    {
        $this->response = [];
        $this->pdo_conn = (new Database())->openConnect();
        $this->pdo_close = (new Database())->closeConnect();
    }
    /**
     * @param string $str_sql
     * @param array $input_data
     * @return boolean
     */
    public function insert(string $str_sql, array $input_data): bool
    {
        if (str_contains($str_sql, 'insert') || str_contains($str_sql, 'INSERT')) {
            $stmt = $this->pdo_conn->prepare($str_sql);
            return ($stmt->execute($input_data)) ? true : false;
        }

        return false;
    }
    /**
     * @param string $str_sql
     * @param array $input_data
     * @param string $fetch_option | FETCH_ASSOC, FETCH_BOTH, FETCH_LAZY, FETCH_NAMED, FETCH_NUM, FETCH_OBJ |
     * @return array
     */
    public function select(string $str_sql, array $input_data = [], string $fetch_option = 'FETCH_OBJ'): array
    {
        if (str_contains($str_sql, 'select') || str_contains($str_sql, 'SELECT')) {
            $stmt = $this->pdo_conn->prepare($str_sql);
            $stmt->execute($input_data);
            $data = $stmt->fetchAll(self::FETCH_TYPE[$fetch_option]);
            $this->pdo_conn->beginTransaction();

            foreach ($data as $row) {
                array_push($this->response, $row);
            }

            $this->pdo_close;
            return $this->response;
        }

        return $this->response;
    }
    /**
     * @param string $str_sql
     * @param array $input_data
     * @return boolean
     */
    public function update(string $str_sql, array $input_data): bool
    {
        if (str_contains($str_sql, 'update') || str_contains($str_sql, 'UPDATE')) {
            $stmt = $this->pdo_conn->prepare($str_sql);
            return ($stmt->execute($input_data)) ? true : false;
        }

        return false;
    }
    /**
     * @param string $str_sql
     * @param array $input_data
     * @param boolean set true for MULTIPLE_DELETE
     * @return boolean
     */
    public function delete(string $str_sql, array $input_data = [], bool $MULTIPLE_DELETE = false): bool
    {
        if (str_contains($str_sql, 'delete') || str_contains($str_sql, 'DELETE')) {

            if ($MULTIPLE_DELETE == false) {
                $stmt = $this->pdo_conn->prepare($str_sql);
                return ($stmt->execute($input_data)) ? true : false;
            } else {
                $stmt = $this->pdo_conn->prepare($str_sql);
                return ($stmt->execute()) ? true : false;
            }
        }

        return false;
    }
    /**
     * @param string $str_sql
     * @param array $input_data
     * @param string $fetch_option
     * @return array
     */
    public function innerJoin(string $str_sql, array $input_data = [], string $fetch_option = 'FETCH_OBJ'): array
    {
        $stmt = $this->pdo_conn->prepare($str_sql);
        $stmt->execute($input_data);
        $data = $stmt->fetchAll(self::FETCH_TYPE[$fetch_option]);
        $this->pdo_conn->beginTransaction();

        foreach ($data as $row) {
            array_push($this->response, $row);
        }

        $this->pdo_close;
        return $this->response;
    }
}

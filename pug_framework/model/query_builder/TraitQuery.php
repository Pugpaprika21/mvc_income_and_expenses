<?php

namespace Pug_Framework\Model\Query_Builder;

use Pug_Framework\Model\Db_Config\Database;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/Autoload.php';

trait TraitQuery
{
    private $pdo_conn = null;
    /**
     * num row function
     *
     * @param array $count_rows
     * @return integer
     */
    public static function countRows(array $count_rows): int
    {
        return count($count_rows);
    }
}

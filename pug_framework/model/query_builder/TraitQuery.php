<?php

namespace Pug_Framework\Model\Query_Builder;

use Pug_Framework\Model\Db_Config\Database;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

trait TraitQuery
{
    private $pdo_conn = null;

    public static function countRows(array $count_rows): int
    {
        return count($count_rows);
    }
}

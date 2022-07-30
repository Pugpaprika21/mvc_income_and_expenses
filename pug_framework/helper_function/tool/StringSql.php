<?php

namespace Pug_Framework\Helper_Function\Tool;

final class StringSql
{
    /**
     * @param object $request_sql
     * @return object
     */
    public static function letter(object $request_sql): object
    {
        $fields = [];
        $values = [];

        foreach ($request_sql as $key => $value) {
            if (array_key_exists($key, $request_sql[$key])) {
                $fields[] = $key;
                $values[] = ':' . $value;
            }
        }

        return (object)[
            'fields' => implode(', ', $fields),
            'values' => implode(', ', $values),
            'data' => (object)$request_sql
        ];
    }
}

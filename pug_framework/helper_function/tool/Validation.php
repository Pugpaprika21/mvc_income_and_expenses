<?php

namespace Pug_Framework\Helper_Function\Tool;

final class Validation
{
    private static $all_input = [];
    /**
     * @param [array|object] $req_formData 
     * @return self
     */
    public static function inspect($req_formData = null): self
    {
        if (is_array($req_formData) || is_object($req_formData)) {

            $counter = 1;
            $req_formData_output = [];
            foreach ($req_formData as $req_formData_key => $req_formData_values) {

                if ($req_formData[$req_formData_key] !== '') {

                    if (array_key_exists($req_formData_key, $req_formData) && in_array($req_formData[$req_formData_key], $req_formData)) {
                        $req_formData_output[$req_formData_key] = htmlspecialchars($req_formData_values);
                    }
                }

                $counter++;
            }
            self::$all_input = $req_formData_output;
            return new self;
        }

        self::$all_input = ['type_error' => 'needle param array|object'];
        return new self;
    }
    /**
     * @return object
     */
    public function result(): object
    {
        $result = self::$all_input;
        return (is_array($result)) ? json_encode($result) : (object)[];
    }
}

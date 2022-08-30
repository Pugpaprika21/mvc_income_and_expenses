<?php

namespace Pug_Framework\Http\Http_Request;

class SeverRequestMethod
{
    private array $serverMethod = [
        'POST',
        'GET',
        'PUT',
        'DELETE',
        'PATCH'
    ];
    /**
     * @param string $methodOption
     * @return object
     */
    public function required(string $methodOption): string
    {
        $count = 0;
        $defultMethod = $_SERVER['REQUEST_METHOD'];

        if ($this->checkStringCase($methodOption) !== '') {

            $strCase = $this->checkStringCase($methodOption);

            for ($i = 0; $i < count($this->serverMethod); $i++) {

                if ($this->serverMethod[$i] == $strCase) {
                    return $this->serverMethod[$i];
                }
            }

            return '';
        }
    }
    /**
     * @param string $checkString
     * @return string
     */
    private function checkStringCase(string $checkString): string
    {
        $stringCase = '';

        if (strtolower($checkString)) {
            $stringCase = $checkString;
        } else if (strtoupper($checkString)) {
            $stringCase = $checkString;
        }

        return $stringCase;
    }
}

$serverMethod = new SeverRequestMethod();

if ($serverMethod->required('POST')) {
}

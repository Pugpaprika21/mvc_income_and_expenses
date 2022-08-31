<?php

namespace Pug_Framework\Http\Http_Request;

class ServerRequestMethod
{
    private string $resultMethod = '';
    private array $serverMethod = ['POST', 'GET', 'PUT', 'DELETE', 'PATCH', 'post', 'get', 'put', 'delete', 'patch'];
    /**
     * @return object
     */
    public function required(): object
    {
        $defultMethod = htmlspecialchars($_SERVER['REQUEST_METHOD']);

        for ($i = 0; $i < count($this->serverMethod); $i++) {

            if ($this->serverMethod[$i] == $this->checkStringCase($defultMethod)) {
                $this->resultMethod = $this->checkStringCase($defultMethod);
                return $this;
            }
        }

        $this->resultMethod = '';
        return $this;
    }
    /**
     * @return string
     */
    public function actionName(string $nameParam): string
    {
        if ($this->resultMethod !== '') {
            // ...
            return '';
        }

        return '';
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

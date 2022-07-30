<?php

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());

class HttpString
{
    private $arrParamsQuery = [];
    /**
     * @param string $url
     * @return object
     */
    public function getUrlComponents(string $url): object
    {
        if (is_string($url)) {
            $url_components = parse_url($url);
            $this->arrParamsQuery = $url_components;
            return $this;
        }

        $this->arrParamsQuery = ['error' =>  false];
        return $this;
    }
    /**
     * @param string $param_name
     * @return object
     */
    public function showOne(string $param_name): object
    {
        if (is_array($this->arrParamsQuery) && is_string($param_name)) {
            parse_str($this->arrParamsQuery[$param_name], $params);
            return (object)$params;
        }

        return (object)[];
    }
}

$httpResult = (new HttpString())
    ->getUrlComponents('https://www.geeksforgeeks.org?name=Tonny&age=24')
    ->showOne('query');

print_r($httpResult);

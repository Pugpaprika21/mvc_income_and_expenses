<?php

namespace Pug_Framework\Helper_Function\Tool;

class HttpString
{
    private $arrParamsQuery = [];
    /**
     * 'https://www.geeksforgeeks.org?name=Tonny&age=24'
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
    public function getOne(string $param_name): object
    {
        if (is_array($this->arrParamsQuery) && is_string($param_name)) {
            parse_str($this->arrParamsQuery[$param_name], $params);
            $this->arrParamsQuery = $params;
            return (object)$params;
        }

        return (object)[];
    }
}


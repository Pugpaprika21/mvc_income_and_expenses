<?php

use Pug_Framework\Helper_Function\Tool\HttpString;
use Pug_Framework\Include\Autoload\Autoloader;

require_once dirname(__DIR__) . '../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

define('load', Autoloader::register());
/**
 * @return object
 */
function displayURL(): object
{
    $httpStr = (new HttpString())
        ->getUrlComponents('https://www.geeksforgeeks.org?name=Tonny&age=24')
        ->showOne('query');
    return $httpStr;
}


class URLcurrent
{
    public $getUrl = '';

    public function currentHTTP(): object
    {
        $url = '';
        $protocol = '';

        if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) {
            $protocol .= 'https://';
        } else {
            $protocol .= 'http://';
        }

        $url .= $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->getUrl = $url;

        return $this;
    }
}

$urlNow = (new URLcurrent())->currentHTTP();
print_r($urlNow);

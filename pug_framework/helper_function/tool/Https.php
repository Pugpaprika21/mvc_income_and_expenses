<?php

namespace Pug_Framework\Helper_Function\Tool;

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

// $urlNow = (new URLcurrent())->currentHTTP();
// print_r($urlNow);

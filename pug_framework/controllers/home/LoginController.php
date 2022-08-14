<?php

namespace Pug_Framework\Controllers\Home;

require_once dirname(__DIR__) . '../../../pug_framework/include/autoload/Autoload.php';

class LoginController
{
    /**
     * Home Login
     * @param object $request
     * @return void
     */
    public function login(object $request): void
    {
        print_r($request);
    }
}

<?php

namespace Pug_Framework\Controllers\Home;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

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
        $sqlCheck = "SELECT username, password, role FROM user_tb WHERE username =:username AND password =:password";

        $resQuery = (new Query())->select($sqlCheck, [
            'username' => $request->username,
            'password' => $request->password
        ]);

        Response::render($resQuery)->jsonString();
    }
}

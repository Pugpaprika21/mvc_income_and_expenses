<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\User;

use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

require_once '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

class UserController
{
    /**
     * @param object $request
     * @return void
     */
    public function getUserProfile(object $request): void
    {
        $sql = "SELECT * FROM user_tb WHERE username =:username AND password =:password";
        $getUser = (new Query())->select($sql, [
            'username' => $request->username,
            'password' => $request->password
        ]);

        if (count($getUser) > 0) {
            Response::render($getUser)->jsonString();
        }
    }
}

<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\User;

use Pug_Framework\Model\Query_Builder\Query;

require_once '../../../../mvc_income_and_expenses/pug_framework/include/autoload/Autoload.php';

class UserController
{
    /**
     * @param object $request
     * @return array
     */
    public function getUserProfile(object $request): array
    {
        $sql = "SELECT * FROM user_tb WHERE username =:username AND password =:password";
        $getUser = (new Query())->select($sql, [
            'username' => $request->username,
            'password' => $request->password
        ]);

        $listUsers = [];

        if (count($getUser) > 0) {
            return $getUser;
        } 

        return $listUsers;
    }
}

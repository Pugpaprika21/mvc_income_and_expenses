<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\Home;

use Pug_Framework\Helper_Function\Tool\CreateUrl;
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
        $sqlCheck = "SELECT id, username, password, role FROM user_tb WHERE username =:username AND password =:password";

        $userLogin = (new Query())->select($sqlCheck, [
            'username' => $request->username,
            'password' => $request->password
        ]);

        if (count($userLogin) > 0) {

            $locationViewLogin = '../../../../mvc_income_and_expenses/pug_framework/resource/view/user/user_page.php';

            $_SESSION['user_id'] = $userLogin[0]->id;
            $_SESSION['username'] = $userLogin[0]->username;
            $_SESSION['password'] = $userLogin[0]->password;

            CreateUrl::display_path($locationViewLogin)->withQueryString([
                'status' => 200,
                'message' => 'login_completed'
            ]);
        }
    }
}

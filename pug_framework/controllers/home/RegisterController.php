<?php

namespace Pug_Framework\Controllers\Home;

use Pug_Framework\Helper_Function\Tool\CreateUrl;
use Pug_Framework\Model\Query_Builder\Query;

require_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

class RegisterController
{
    /**
     * @param object $request
     * @return void
     */
    public function register(object $request): void
    {
        $sqlSelUniq = "SELECT username, password FROM user_tb WHERE username =:username AND password =:password";
        
        $selectCheck = (new Query())->select($sqlSelUniq, [
            'username' => $request->username,
            'password' => $request->password
        ]);

        $sqlRegister = "INSERT INTO user_tb(username, password, gmail, phone, image, datetime, role) VALUES(:username, :password, :gmail, :phone, :image, :datetime, :role)";
      
        $checkQuery = (new Query())->insert($sqlRegister, [
            'username' => $request->username,
            'password' => $request->password,
            'gmail' => $request->gmail,
            'phone' => $request->phone,
            'image' => $request->image,
            'datetime' => $request->datetime,
            'role' => $request->role,
        ]);

        if ($checkQuery) {
            $locationViewLogin = '../../../../mvc_income_and_expenses/pug_framework/resource/view/home/login.php';
            CreateUrl::display_path($locationViewLogin)->withQueryString([
                'status' => 200,
                'message' => 'insert successfully'
            ]);
        }

        return;
    }
}

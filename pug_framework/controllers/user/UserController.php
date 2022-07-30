<?php

declare(strict_types=1);

namespace Pug_Framework\Controllers\User;

use Pug_Framework\Controllers\Foundation\BaseController;
use Pug_Framework\Helper_Function\Tool\CreateUrl;
use Pug_Framework\Helper_Function\Tool\FileUpload;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

include_once dirname(__DIR__) . '../../../pug_framework/include/autoload/autoload.php';

class UserController extends BaseController
{
    /**
     * @param object $request
     * @return void
     */
    public function register(object $request): void
    {
        $sql_check_uniq = "SELECT username, password, role FROM tb_user WHERE username =:username AND password =:password";

        $check_uniq = (new Query())->select($sql_check_uniq, [
            'username' => $request->username,
            'password' => $request->password
        ]);

        if (Query::countRows($check_uniq) == 0) {

            $path_upload = '../../../pug_framework/public/auth_upload/';
            $path_location = '../../../pug_framework/resource/view/auth/register.php';

            $sql_register = "INSERT INTO tb_user(username, password, gmail, phone, profile, role) VALUES(:username, :password, :gmail, :phone, :profile, :role)";

            $profile = FileUpload::option([

                'name' => $request->name,
                'full_path' => $request->full_path,
                'type' => $request->type,
                'tmp_name' => $request->tmp_name,
                'error' => $request->error,
                'size' => $request->size,

            ])->toDirectory($path_upload)->save();

            $query_register = (new Query())->insert($sql_register, [
                'username' => $request->username,
                'password' => $request->password,
                'gmail' => $request->gmail,
                'phone' => $request->phone,
                'profile' => $profile,
                'role' => $request->role
            ]);

            if ($query_register) {

                CreateUrl::display_path($path_location)->withQueryString();

            } else {
                Response::error('insert error!');
            }
   
        } else {
            Response::error();
        }
    }
    /**
     * @param object $request
     * @return void
     */
    public function login(object $request): void
    {
        $getLogin = (new Query())->select("SELECT username, password FROM tb_user WHERE username =:username AND =:password", [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if (Query::countRows($getLogin) > 0) {
            Response::render($getLogin)->jsonString();
        } else {
            Response::error('not found username and password');
        }

        Response::error('login failed');
    }
}

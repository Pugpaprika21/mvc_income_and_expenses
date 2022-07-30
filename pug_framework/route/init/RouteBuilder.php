<?php

use DateTime;
use Pug_Framework\Route\Init\Route;
use Pug_Framework\Http\Http_Request\Request;
use Pug_Framework\Http\Http_Response\Response;
use Pug_Framework\Model\Query_Builder\Query;

$routes = new Route();

const TIME_NOW = new DateTime('now');

$routes->route('GET', '/', function (Request $request): void {
    // ...
});

$routes->route('POST', '/register', function (Request $request): void {

    $sql_register = 'INSERT INTO tb_user(username, password, token, create) VALUES(?, ?, ?, ?)';

    $register = (new Query())->insert($sql_register, [
        'username' => $request->username,
        'password' => $request->password,
        'token' => $request->token,
        'create' => TIME_NOW
    ]);

    if ($register) {
        Response::render((array)$request)->jsonString();
    }

    return;
});

$routes->run();

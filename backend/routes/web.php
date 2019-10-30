<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/api-key', function (){
    return Str::random(32);
});
$router->get('/jwt-key', function (){
    return 'Pu72a0pbGWa7r73QbkQ1ZUigQSjVfO';
});
$router->post('/auth/login', ['uses' => 'Auth\AuthController@authenticate']);
$router->post('/user/create', ['uses' => 'UserController@store']);

$router->group(['middleware' => 'jwt.auth'], function() use ($router) {
        $router->get('users', function() {
            $users = \App\User::all();
            return response()->json($users);
        });

        $router->get('/article', ['uses' => 'ArticleController@index']);
        $router->get('/article/{id}', ['uses' => 'ArticleController@getSpecific']);
        $router->get('/article/{id}/view', ['uses' => 'ArticleController@getDetails']);
        $router->post('/article/', ['uses' => 'ArticleController@store']);

        $router->get('/test/{id_test}', ['uses' => 'TestController@index']);
    }
);

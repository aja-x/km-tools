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
$router->post('/login', ['uses' => 'Auth\AuthController@authenticate']);
$router->post('/register', ['uses' => 'Auth\AuthController@register']);

$router->group(['middleware' => 'jwt.auth'], function() use ($router) {
        $router->get('user/{id}', ['uses' => 'UserController@view']);
        $router->put('user/{id}', ['uses' => 'UserController@update']);
        $router->put('user/{id}/password', ['uses' => 'UserController@updatePassword']);
        $router->delete('user/{id}', ['uses' => 'UserController@destroy']);

        $router->get('/article', ['uses' => 'ArticleController@index']);
        $router->get('/article/{id}', ['uses' => 'ArticleController@filterCategory']);
        $router->get('/article/{id}/view', ['uses' => 'ArticleController@view']);
        $router->post('/article/', ['uses' => 'ArticleController@save']);
        $router->put('/article/{id}', ['uses' => 'ArticleController@save']);
        $router->post('/article/', ['uses' => 'ArticleController@publish']);
        $router->put('/article/{id}', ['uses' => 'ArticleController@publish']);
        $router->delete('/article/{id}', ['uses' => 'ArticleController@destroy']);

        $router->get('/test/{id}', ['uses' => 'ArticleController@test']);
    }
);

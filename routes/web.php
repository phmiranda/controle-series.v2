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

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use($router) {
    $router->post('autenticar','TokenController@autenticar');
});

$router->group(['prefix' => 'api', 'middleware' => 'autenticador'], function () use ($router) {
    $router->group(['prefix' => 'series'], function () use ($router) {
        $router->get('', 'SerieController@index');
        $router->post('', 'SerieController@store');
        $router->get('{id}', 'SerieController@show');
        $router->put('{id}','SerieController@update');
        $router->delete('{id}','SerieController@destroy');

        $router->get('{id}/episodios','EpisodioController@pesquisarPorSerie');
    });

    $router->group(['prefix' => 'episodios'], function () use ($router) {
        $router->get('', 'EpisodioController@index');
        $router->post('', 'EpisodioController@store');
        $router->get('{id}', 'EpisodioController@show');
        $router->put('{id}','EpisodioController@update');
        $router->delete('{id}','EpisodioController@destroy');
    });
});

$router->post('/api/login','TokenController@gerarToken');


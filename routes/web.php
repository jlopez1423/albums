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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$app->group(['prefix' => 'album/'], function ($app) {

    $app->get('/','AlbumsController@index'); //get all the albums

    $app->post('/','AlbumsController@store'); //store single album

    $app->get('/{id}/', 'AlbumsController@show'); //get single album

    $app->put('/{id}/','AlbumsController@update'); //update single album

    $app->delete('/{id}/','AlbumsController@destroy'); //delete single album

});
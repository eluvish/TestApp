<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items/add', 'ItemsController@index');
Route::post('/items/add', 'ItemsController@create');
Route::get('/items', 'ItemsController@showall');

Route::get('/login', 'Auth\Authcontroller@getLogin');

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

Route::group(['middleware' => 'auth'], function () {

    // Items
    Route::get('/items','ItemsController@showAll');
    Route::get('/upload', 'ItemsController@create');
    Route::post('/upload', 'ItemsController@store');
    Route::get('/items/{id}', 'ItemsController@show');
    Route::patch('/items/{id}', 'ItemsController@update');
    Route::delete('/items/{id}', 'ItemsController@destroy');

    // Tags
    Route::get('/tags', 'TagsController@showAllTags');
    Route::get('/tags/{name}', 'TagsController@show');
    Route::post('/tags/link', 'TagsController@link');
    Route::delete('/tags/unlink', 'TagsController@unlink');

    // Outfits - feature half implemented, can't save outfits
    Route::get('/create', 'OutfitsController@index');
    Route::post('/create', 'OutfitsController@store');
    Route::get('/outfits', 'OutfitsController@showAllOutfits');
});

# Authorization
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

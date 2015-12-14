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
    Route::get('/items','ItemsController@index');
    Route::get('/upload', 'ItemsController@create');
    Route::post('/upload', 'ItemsController@store');
    Route::get('/items/{id}', 'ItemsController@show');
    Route::patch('/items/{id}', 'ItemsController@update');
    Route::delete('/items/{id}', 'ItemsController@destroy');

    // Tags
    Route::post('/tags/unlink', 'TagsController@unlink');
    Route::post('/tags/link', 'TagsController@link');
    Route::get('/tags/{id}', 'TagsController@show');

    // Outfits
    Route::get('/create', 'OutfitsController@index');
});

# Show login form (dont need?, make it redirect?)
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

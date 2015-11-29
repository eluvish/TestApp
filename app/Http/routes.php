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

//Route::group(['middleware' => 'auth'], function () {
    Route::get('/items','ItemsController@index');
    Route::get('/upload', 'ItemsController@create');
    Route::post('/upload', 'ItemsController@store');
    Route::get('/items/{id}', 'ItemsController@show');
    Route::patch('/items/{id}', 'ItemsController@update');
    Route::delete('/items/{id}', 'ItemsController@destroy');
//});

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

Route::get('/confirm', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});

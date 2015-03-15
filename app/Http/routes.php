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

Route::group(['namespace' => 'Admin'], function()
{
    Route::get('/admin', 'DashboardController@index');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'FrontEndController@index');
Route::get('/{category}', [ 'as' => 'category', 'uses' => 'FrontEndController@category' ]);
Route::get('/{category}/{species}', [ 'as' => 'species', 'uses' => 'FrontEndController@species' ]);
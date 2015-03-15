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

Route::group(['namespace' => 'Frontend'], function()
{
    Route::get('/', 'HomeController@index');
    Route::get('/{slug}', [ 'as' => 'category', 'uses' => 'CategoryController@show' ]);
});

Route::group(['namespace' => 'Admin'], function()
{
    Route::get('/admin', 'DashboardController@index');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));
Route::post('admin/users/sendmail', array('as' => 'admin.users.sendmail', 'uses' => 'App\Controllers\Admin\UsersController@sendmail'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::resource('users', 'App\Controllers\Admin\UsersController');
});
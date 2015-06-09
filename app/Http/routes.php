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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('tasks', 'TaskController@index');
Route::get('tasks/create', 'TaskController@create');
Route::get('task/edit/{id}', 'TaskController@edit');
Route::post('tasks', 'TaskController@store');
Route::post('task', 'TaskController@update');
Route::post('task/status', 'TaskController@updateStatus');
Route::post('task/delete', 'TaskController@destroy');

Route::get('priorities', 'PriorityController@index');
Route::get('priority/edit/{id}', 'PriorityController@edit');
Route::post('priority', 'PriorityController@update');
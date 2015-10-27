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
//Filtros para evitar ataques:
Route::when('*', 'csrf', ['post']);

//Rutas de esta manera nos ayudan a personalizarlas lo más posible, es decir,
//colocar la ruta como deseemos.
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//Por otra parte, escribir las rutas de esta manera, nos permite asignar los 
//controllers de manera más rápida, pero perdemos la capacidad de personalizar
//la ruta. 
Route::controllers([
	'users'		=> 'UsersController',
	'auth'		=> 'Auth\AuthController',
	'password'	=> 'Auth\PasswordController',
	'bici'		=> 'BiciController'
]);

//Rutas para módulo de usuario:
Route::group(['prefix' => 'admin', 'namespace' => '\Admin'], function(){
		Route::resource('users', 'UsersController');
	});
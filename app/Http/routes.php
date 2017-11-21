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




Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);



Route::group(['middleware' => 'auth'], function () {
	

 	Route::get('/', function () { return view('index'); });
	//Administracion de Usuarios.
	
	
	Route::get('auth/change-password', 'UserController@show');
	Route::post('auth/change-password', ['as' => 'user.change-password', 'uses' => 'UserController@changePassword']);
	
	Route::resource('auth/user', 'UserController');
	Route::resource('auth/role', 'RoleController',   ['except' => ['show']]);
	Route::resource('auth/permission', 'PermissionController');
    //Datos Basicos
	Route::resource('alimento', 'AlimentoController');
	
	Route::resource('plato', 'PlatoController');
	
	Route::get('receta', 'PlatoController@recetaIndex');
	Route::get('receta/{id}/list', 'PlatoController@recetaList');
	Route::get('receta/{id}/create', 'PlatoController@recetaCreate');
	Route::delete('receta/{id}/delete', 'PlatoController@recetaDestroy');
	Route::post('receta/store', 'PlatoController@recetaStore');
	Route::get('receta/{plato_id}/{alimento_id}/edit', 'PlatoController@recetaEdit');
	Route::post('receta/update', 'PlatoController@recetaUpdate');
	Route::delete('receta/{plato_id}/{alimento_id}/delete', 'PlatoController@ingredienteDestroy');
	
	Route::resource('menu', 'MenuController');
	Route::get('menu/{id}/copy', 'MenuController@copy');
	Route::get('menu/{id}/pdf', 'MenuController@pdf');


});



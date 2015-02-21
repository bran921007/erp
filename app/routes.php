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
	return View::make('modules.home');
});
Route::get('/dashboard', function()
{
	return View::make('modules.home');
});
//Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);

Route::get('/getClientes', ['as' => 'cliente', 'uses' => 'HomeController@getClientes']);
Route::post('/postClientes', ['as' => 'cliente', 'uses' => 'HomeController@postClientes']);
Route::put('/actualizarCliente',['as' => 'cliente', 'uses' => 'HomeController@actualizarClientes']);
Route::delete('borrarCliente/{id}', ['as' => 'cliente', 'uses' => 'HomeController@borrarCliente']);

//Inventario de Productos

Route::get('/getProductos', ['as' => 'cliente', 'uses' => 'HomeController@getProductos']);
Route::post('/postProductos', ['as' => 'cliente', 'uses' => 'HomeController@postProductos']);
Route::put('/actualizarProductos',['as' => 'cliente', 'uses' => 'HomeController@actualizarProductos']);
Route::delete('/borrarProducto/{id}', ['as' => 'cliente', 'uses' => 'HomeController@borrarProducto']);


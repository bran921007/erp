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
Route::get('/login', ['as' => 'cliente', 'uses' => 'AuthController@index']);
Route::get('/logout', ['as' => 'cliente', 'uses' => 'AuthController@logout']);
Route::post('/login', ['as' => 'cliente', 'uses' => 'AuthController@login']);
Route::post('/registrar', ['as' => 'cliente', 'uses' => 'AuthController@registrar']);


//Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/dashboard', ['as' => 'home', 'uses' => 'HomeController@index']);
// SOLO SI ESTAS LOGUEADO PODRAS ACCEDER
// Route::group(array('before' => 'auth'),function()
// {

Route::get('/getClientes', ['as' => 'cliente', 'uses' => 'HomeController@getClientes']);
Route::post('/postClientes', ['as' => 'cliente', 'uses' => 'HomeController@postClientes']);
Route::put('/editarCliente/{id}',['as' => 'cliente', 'uses' => 'HomeController@editarCliente']);
Route::delete('borrarCliente/{id}', ['as' => 'cliente', 'uses' => 'HomeController@borrarCliente']);

//Inventario de Productos

Route::get('/getProductos',  ['as' => 'cliente', 'uses' => 'HomeController@getProductos']);
Route::post('/postProductos',         ['as' => 'cliente', 'uses' => 'HomeController@postProductos']);
Route::put('/editarProducto/{id}',   ['as' => 'cliente', 'uses' => 'HomeController@editarProducto']);
Route::delete('/borrarProducto/{id}', ['as' => 'cliente', 'uses' => 'HomeController@borrarProducto']);

//Categorias

Route::get('/getCategorias' ,          ['as' => 'categoria', 'uses' => 'HomeController@getCategorias']);
Route::post('/postCategoria' ,         ['as' => 'categoria', 'uses' => 'HomeController@postCategoria']);
Route::put('/editarCategoria/{id}',     ['as' => 'categoria', 'uses' => 'HomeController@editarCategoria']);
Route::delete('/borrarCategoria/{id}', ['as' => 'categoria', 'uses' => 'HomeController@borrarCategoria']);

//Compra Pedidos
Route::get('/getCompraPedidos' ,          ['as' => 'categoria', 'uses' => 'HomeController@getCompraPedidos']);
Route::post('/postCompraPedidos' ,         ['as' => 'categoria', 'uses' => 'HomeController@postCompraPedidos']);
Route::put('/editarCompraPedidos/{id}',     ['as' => 'categoria', 'uses' => 'HomeController@editarCompraPedidos']);
Route::delete('/borrarCompraPedidos/{id}', ['as' => 'categoria', 'uses' => 'HomeController@borrarCompraPedidos']);




//Distribuidor

Route::get('/getDistribuidores' ,          ['as' => 'categoria', 'uses' => 'HomeController@getDistribuidores']);
Route::post('/postDistribuidor' ,         ['as' => 'categoria', 'uses' => 'HomeController@postDistribuidor']);
Route::put('/editarDistribuidor/{id}',     ['as' => 'categoria', 'uses' => 'HomeController@editarDistribuidor']);
Route::delete('/borrarDistribuidor/{id}', ['as' => 'categoria', 'uses' => 'HomeController@borrarDistribuidor']);

//Factura
Route::get('/getOrdenes' ,          ['as' => 'categoria', 'uses' => 'HomeController@getOrdenes']);
Route::post('/postOrden' ,         ['as' => 'categoria', 'uses' => 'HomeController@postOrden']);
Route::put('/editarOrden/{id}',     ['as' => 'categoria', 'uses' => 'HomeController@editarOrden']);
Route::delete('/borrarOrden/{id}', ['as' => 'categoria', 'uses' => 'HomeController@borrarOrden']);

Route::get('/getPedido' ,         ['as' => 'categoria', 'uses' => 'HomeController@getPedido']);
Route::get('/pedido/{id}' ,         ['as' => 'categoria', 'uses' => 'HomeController@pedido']);
Route::post('/actualizarStock' ,         ['as' => 'categoria', 'uses' => 'HomeController@actualizarStock']);
Route::put('/agregarStock/{id}' ,         ['as' => 'categoria', 'uses' => 'HomeController@agregarStock']);
Route::post('/postPedido' ,         ['as' => 'categoria', 'uses' => 'HomeController@postPedido']);
Route::get('/postPedido' ,         ['as' => 'categoria', 'uses' => 'HomeController@getPedido']);
Route::post('/postPedidoDetalle' ,         ['as' => 'categoria', 'uses' => 'HomeController@postPedidoDetalle']);


Route::post('/postConfiguracion' ,         ['as' => 'categoria', 'uses' => 'HomeController@postConfiguracion']);
Route::get('/getConfiguracion' ,         ['as' => 'categoria', 'uses' => 'HomeController@getConfiguracion']);


// Route::post('/postPedidoDetalle' ,         ['as' => 'categoria', 'uses' => 'HomeController@postPedidoDetalle']);


//Manejar Pedidos
// Route::get('/getDistribuidores' ,          ['as' => 'categoria', 'uses' => 'HomeController@getDistribuidores']);
// Route::post('/postDistribuidor' ,         ['as' => 'categoria', 'uses' => 'HomeController@postDistribuidor']);
// Route::put('/editarDistribuidor/{id}',     ['as' => 'categoria', 'uses' => 'HomeController@editarDistribuidor']);
// Route::delete('/borrarDistribuidor/{id}', ['as' => 'categoria', 'uses' => 'HomeController@borrarDistribuidor']);

// });

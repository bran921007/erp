<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getClientes()
	{
	   $clientes = DB::table("clientes")->get();
	    return Response::json(array(
	        "clientes"        =>        $clientes
	    ));
	}

	public function postClientes()
	{
		return Cliente::create(Input::all());
	}

	public function actualizarClientes(){
		
	}

	public function destroy($id)
	{
    	Cliente::destroy($id);
	}

 //================= 
 // Productos 

	public function getProductos()
	{
	   $productos = DB::table("productos")->get();
	    return Response::json(array(
	        "productos"        =>        $productos
	    ));
	}

	public function postProductos()
	{
		return Producto::create(Input::all());
	}	
	
	public function actualizarProducto($id)
	{
		// $producto = Producto::find($id);
	 //    $producto->articulo       = Input::get('name');
	 //    $producto->cantidad       = Input::get('cantidad');
	 //    $producto->distribuidor       = Input::get('distribuidor');
	 //    $nerd->save();
		$input = Input::all();

  		Producto::find($id)->update($input);
	}	

	public function borrarProducto($id)
	{
		Producto::destroy($id);
	}


	
	
}

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
	public function __construct(){
		

	}

	public function index()
	{
		//if(!$this->autorizado) return Redirect::to('/login');
		return View::make('modules.home');
	}

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

	public function editarCliente($id){
		$input = Input::all();

  		Cliente::find($id)->update($input);
	}

	public function borrarCliente($id)
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
	
	public function editarProducto($id)
	{
		$input = Input::all();

  		Producto::find($id)->update($input);
	}	

	public function borrarProducto($id)
	{
		Producto::destroy($id);
	}

	//Categoria

	public function getCategorias()
	{
	   $categorias = DB::table("categorias")->get();
	    return Response::json(array(
	        "categorias"        =>        $categorias
	    ));
	}

	public function postCategoria()
	{
		return Categoria::create(Input::all());
	}	
	
	public function actualizarCategoria($id)
	{
		
		$input = Input::all();

  		Categoria::find($id)->update($input);
	}	

	public function borrarCategoria($id)
	{
		Categoria::destroy($id);
	}

	//Distribuidor

	public function getDistribuidores(){
		$distribuidores = DB::table("distribuidores")->get();
	    return Response::json(array(
	        "distribuidores"        =>        $distribuidores
	    ));

	}
    public function postDistribuidor(){

    	return Distribuidor::create(Input::all());

    }
    public function editarDistribuidor($id){

		$input = Input::all();

  		Distribuidor::find($id)->update($input);
    }
    public function borrarDistribuidor($id){

    	Distribuidor::destroy($id);

    }

	
	
}

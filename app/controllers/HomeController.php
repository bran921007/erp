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

	// RD${{itbis = subtotal* 18 / 100}}
	private $id = 0;

	public function __construct(){

		if(Auth::check()){
			$this->id = Auth::user()->id;
		}
			return Redirect::to('/login');


	}

	public function index()
	{
		// if(!$this->autorizado) return Redirect::to('/login');
		if(Auth::check()){
			return View::make('modules.home');
		}
		//
		return Redirect::to('/login');
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getConfiguracion(){
		// $id = 1;
		$configuracion = Configuracion::find($this->id);

		return Response::json(array(
			'success'=>true,
			'configuracion' => $configuracion
		));
	}

	public function postConfiguracion()
	{
		//Auth::user()->id;
		// $id = 1;
		$input = Input::all();
		// $input = array(
		//  'empresa'	 =>'Apetito',
		//  'rnc'		  => '41241'
		// );

  		$configuracion = Configuracion::find($this->id)->update($input);

		// $configuracion = Configuracion::create(Input::all());
		// $configuracion_id = $configuracion->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $id
		));
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
		$cliente = Cliente::create(Input::all());
		$cliente_id = $cliente->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $cliente_id
		));
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
		$producto = Producto::create(Input::all());
		$producto_id = $producto->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $producto_id,
			'producto'=> $producto
		));
	}

	public function editarProducto($id)
	{
		$input = Input::all();

  		Producto::find($id)->update($input);

  		return Response::json(array(
  			'success'=> true,
  			'msg'	 => 'Cambio realizado satisfactoriamente'
  		));
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
		$categoria =  Categoria::create(Input::all());
		$categoria_id = $categoria->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $categoria_id
		));
	}

	public function editarCategoria($id)
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

    	$distribuidor = Distribuidor::create(Input::all());
    	$distribuidor_id = $distribuidor->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $distribuidor_id
		));

    }
    public function editarDistribuidor($id){

		$input = Input::all();

  		Distribuidor::find($id)->update($input);
    }
    public function borrarDistribuidor($id){

    	Distribuidor::destroy($id);

    }
		//Pedidos
    public function getPedido(){
    	$pedidos = DB::table("pedidos")->get();


    	foreach($pedidos as $key => $value){
    		$id = $pedidos[$key]->id_cliente;
				$cliente = Cliente::find($id);
    		$pedidos[$key]->id_cliente = $cliente->nombre." ".$cliente->apellido;
    	}

	    return Response::json(array(
		 'pedidos'=>	$pedidos
		));

    }

    public function pedido($id){
    	//$pedido = new Pedido();
			try{

		    	$pedido = Pedido::find($id);
		    	$detalle = Detalle::where('id_pedido','=',$id)->get();

					$id = $pedido->id_cliente;
					$cliente = Cliente::find($id);
		    	$pedido->id_cliente = $cliente->nombre." ".$cliente->apellido;

				 return Response::json(array(
					 'pedido'=>	$pedido,
					 'detalles'=>	$detalle
					));

			}catch(Exception $e){

				return Response::json(array(
				 'msg'=>'No hay ningun pedido disponible',
				 'pedido'=>[],
				 'detalles'=>[]
				));

			}

    }

	public function postPedido(){



		$pedido =  Pedido::create(Input::all());
		$pedido_id = $pedido->id;

		return Response::json(array(
			'success' => true,
			'msg'			=> "Venta realizada satisfactoriamente",
			'id'	  => $pedido_id
		));
	}

	//Pedidos detalle
	public function getPedidoDetalle(){
    	$pedidos = DB::table("pedidosdetalles")->get();
	    return Response::json(array(
	        "distribuidores"        =>        $distribuidores
	    ));

    }

    public function actualizarStock(){
    	//$detalle = new Detalle();
    	$id 	  = Input::get('id');
    	$cantidad = Input::get('cantidad');

    	$producto = Producto::find($id);
    	$producto->cantidad = $producto->cantidad - $cantidad;
			$cantidad_actual = $producto->cantidad;
    	$producto->save();
    	return Response::json(array(
    	 'success'=>true,
    	 'cantidad'=> $cantidad,
			 'cantidad_actual'=>$cantidad_actual,
    	 'id'=> $id
    	));
    }

		public function agregarStock($id){
			$cantidad = Input::get('cantidad');

			$producto = Producto::find($id);
			$producto->cantidad = $producto->cantidad + $cantidad;
			$stock = $producto->cantidad;
			$producto->save();
			return Response::json(array(
			 'success'=>true,
			 'msg'=> 'Stock actualizado correctamente',
			 'cantidad'=> $stock,
			 'id'=> $id
			));

		}

    public function postPedidoDetalle(){

		$input = Input::all();

		$pedidoDetalle =  Detalle::create($input);
		$pedidoDetalle_id = $pedidoDetalle->id;

		return Response::json(array(
			'success' => true,
			'msg'			=> "Venta realizada satisfactoriamente",
			'detalle' => $input,
			//'detalle2'=> $detalle2,
			// 'id'	  => $pedidoDetalle_id
		));
	}

	public function getCompraPedidos(){

		// $compras = DistribuidorCompra::all();
		$compras = DistribuidorCompra::all();
		foreach($compras as $compra){
			$compra->producto;
			$compra->distribuidor;
		}

		return Response::json(array(
		 'compras'=>$compras
		));

	}
	public function postCompraPedidos(){

		$input  = Input::all();
		$compra = DistribuidorCompra::create($input);

		$id_articulo = $input['id_articulo'];

		$producto = Producto::find($id_articulo);
		$producto->cantidad = $producto->cantidad + $input['cantidad'];
		$stock = $producto->cantidad;
		$producto->save();

		return Response::json(array(
			'success'=>true,
		 	'compra'	 =>$compra,
			'stock'		=>$stock
		));

	}
	public function editarCompraPedidos($id){

		$input = Input::all();

		DistribuidorCompra::find($id)->update($input);

	}
	public function borrarCompraPedidos($id){
		DistribuidorCompra::destroy($id);
	}




}

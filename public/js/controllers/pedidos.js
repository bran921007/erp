(function(){

	var app = angular.module('pedidos',[]);

	app.controller("pedidosController", function($scope,$http,$log,$filter, $location){

		$scope.carrito = [];
		$scope.estado = 'pagado';
		$scope.id_cliente = 1;
		$scope.tipo = 'venta';
		$scope.metodo = 'efectivo';

		$scope.realizarPedidoModal = function(){
			$scope.pedidoModal = !$scope.pedidoModal;
		}

		$scope.inventario = {};
			$http.get('/getProductos').success(function(data)
		{
			$scope.inventario = data.productos;//así enviamos los posts a la vista
		});
		//$scope.id_cliente = 0;

		$scope.detectarId = function(id){

			$scope.id_cliente = id;
		};

		$scope.verCarrito = function(cart){
			console.log($scope.carrito);
		}

		$scope.crearPedido = function(){
			var pedido = {
				id_cliente: $scope.id_cliente,
				metodo: $scope.metodo,
				subtotal: $scope.subtotal,
				itbis: $scope.itbis,
				total: $scope.total,
				estado: $scope.estado,
				tipo: $scope.tipo
				//fecha: $scope.fecha
			};

			$scope.id_pedido = 0;
			$http.post('/postPedido', pedido).success(function(data){
				console.log(data.success);
				//detalle.id_pedido = data.id;
				//console.log("id_pedido:"+detalle.id_pedido);

				for (var i = 0; i < $scope.carrito.length; i++) {

					var detalle ={
						id_pedido   : data.id,
						id_producto : $scope.carrito[i].id,
						articulo    : $scope.carrito[i].producto,
						cantidad    : $scope.carrito[i].cantidad,
						precio      : $scope.carrito[i].precio,
						total       : $scope.carrito[i].subtotal,
						fecha       : $scope.carrito[i].fecha
					};
					//console.log(detalle);
					$http.post('/postPedidoDetalle',detalle).success(function(data){
						console.log(data);
						$scope.carrito = [];
					});
					var cantidadNueva ={
						id:       $scope.inventario[i].id,
						cantidad: $scope.inventario[i].cantidad
					};

					$http.post('/actualizarStock',cantidadNueva).success(function(data){
						console.log(data);
					});
					//console.log($scope.inventario[i].cantidad);
					//console.log($scope.inventario[i].cantidad - $scope.carrito[i].cantidad);

				}
				// $scope.pedidoModal = !$scope.pedidoModal;
				// window.location.href = "/factura/"+data.id;
				$location.url("/factura/"+data.id);

			});






			$scope.pedidoModal = !$scope.pedidoModal;
		};

		$scope.hover = function(p) {
			// Shows/hides the delete button on hover
			return p.showDelete = ! p.showDelete;
		};


		$scope.subtotal = 0;
		$scope.itbis = 0;
		$scope.total = 0;

		$scope.fecha = $filter('date')(Date.now(), "dd-MM-yyyy") ;

		$scope.addCarrito = function(articulo){

			var producto;
			for (var i = 0; i < $scope.carrito.length; i++) {
				if ($scope.carrito[i].id == articulo.id) {
					producto = $scope.carrito[i];
				}
			}

			for (var i = 0; i < $scope.inventario.length; i++) {
				if ($scope.inventario[i].id == articulo.id) {
					$scope.inventario[i].cantidad--;
				}
			}

			if (!producto) {
				$scope.carrito.push({
					id: articulo.id,
					producto: articulo.articulo,
					cantidad: 1,
					precio: articulo.precioVenta
				});
			} else {
				producto.cantidad++;
			}

			console.log($scope.carrito);
			// $scope.carrito.push(producto);
			// console.log($scope.carrito);
			// $scope.subtotal = $scope.subtotal + articulo.precioVenta;
			// $scope.itbis = $scope.subtotal * 18 / 100;
			// $scope.total = $scope.itbis + $scope.subtotal;

		};

		$scope.subtotales = function(){
			var subtotales = 0;
			angular.forEach($scope.carrito, function(item){
				subtotales += item.cantidad * item.precio;
			});

			return subtotales;
		};





		$scope.deleteArticulo = function(articulo){
			var producto;
			for (var i = 0; i < $scope.carrito.length; i++) {
				if ($scope.carrito[i].id == articulo.id) {
					producto = $scope.carrito[i];
				}
			}

			for (var i = 0; i < $scope.inventario.length; i++) {
				if ($scope.inventario[i].id == articulo.id) {
					$scope.inventario[i].cantidad++;
				}
			}

			if (producto){
				if(producto.cantidad == 1){
					var index = $scope.carrito.indexOf(producto);

					if (index != -1) {
						// Remove todo-item from array
						$scope.carrito.splice( index, 1 );
					}
				}
				producto.cantidad--;
			}

			$scope.subtotal = $scope.subtotal - articulo.precio;
			$scope.itbis = $scope.subtotal * 18 / 100;
			$scope.total = $scope.itbis + $scope.subtotal;

		};



	});


})();

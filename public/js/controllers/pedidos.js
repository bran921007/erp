(function(){

	var app = angular.module('pedidos',[]);

	app.controller("pedidosController", function($scope,$http,$log,$filter){


		$scope.realizarPedidoModal = function(){
			$scope.pedidoModal = !$scope.pedidoModal;
		}

		$scope.inventario = {};
			$http.get('/getProductos').success(function(data)
		{
			$scope.inventario = data.productos;//así enviamos los posts a la vista
		});


		$scope.crearPedido = function(){
			var pedido = {
				id_cliente: $scope.id_cliente,
				metodo: $scope.metodo,
				subtotal: $scope.subtotal,
				itbis: $scope.itbis,
				total: $scope.total,
				estado: $scope.estado,
				tipo: $scope.tipo,
				fecha: $scope.fecha
			};
			$http.post('/postPedido', pedido);
			$scope.pedidoModal = !$scope.pedidoModal;
		};

		$scope.hover = function(p) {
			// Shows/hides the delete button on hover
			return p.showDelete = ! p.showDelete;
		};

		$scope.carrito = [];
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

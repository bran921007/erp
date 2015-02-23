(function(){

	var app = angular.module('pedidos',[]);

	app.controller("pedidosController", function($scope,$http,$log){

		$scope.inventario = {};
			$http.get('/getProductos').success(function(data)
		{
			$scope.inventario = data.productos;//así enviamos los posts a la vista
		});

		$scope.hover = function(p) {
			// Shows/hides the delete button on hover
			return p.showDelete = ! p.showDelete;
		};

		$scope.carrito = [];
		$scope.subtotal = 0;
		$scope.itbis = 0;
		$scope.total = 0;

		$scope.addCarrito = function(articulo){
			var producto;
			for (var i = 0; i < $scope.carrito.length; i++) {
				if ($scope.carrito[i].id == articulo.id) {
					producto = $scope.carrito[i];
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

			$scope.subtotal = $scope.subtotal + articulo.precioVenta;
			$scope.itbis = $scope.subtotal * 18 / 100;
			$scope.total = $scope.itbis + $scope.subtotal;
		};

		$scope.deleteArticulo = function(articulo){
			var producto;
			for (var i = 0; i < $scope.carrito.length; i++) {
				if ($scope.carrito[i].id == articulo.id) {
					producto = $scope.carrito[i];
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

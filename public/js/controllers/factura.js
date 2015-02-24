(function(){

	var app = angular.module('factura',[]);

	app.controller("facturaController", function($route, $scope,$http,$location,$routeParams){

		$scope.id = $route.current.params.id;
		$scope.pedidos = {};
		$scope.detalles ={};

		$http.get('/pedido/'+$scope.id).success(function(data){
			$scope.pedidos = data.pedido;
			$scope.detalles = data.detalles;
			console.log($scope.pedidos);
			console.log($scope.detalles);
		});

		$scope.fecha = Date.now();


		// console.log($scope.pedido);
		//alert(routeParams.id);

});
	
})();
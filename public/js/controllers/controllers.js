(function(){

    var app = angular.module('controllers',['clientes','dashboard','informe','inventario','pedidos','distribuidor','factura','categoria','factura_pedidos','manejar_pedidos','compras_pedidos','configuracion']);

    app.controller("tabsController", function($scope,$http)
    {
      $scope.fecha = Date.now();
    });

    app.controller("authController", function($scope,$http){

     	$scope.registro = {};

		$scope.registrar = function($event)
		{
			$event.preventDefault();

			console.log($scope.registro);
			$http.post('/registrar',$scope.registro);
        };

	    $scope.acceso = {};

    $scope.login = function($event)
    {
    	$event.preventDefault();

    	var log ={
    		email:     $scope.acceso.email,
    		password:  $scope.acceso.password
    	};
    	console.log(log);

    	$http.post('/login',log).success(function(data, status, headers, config) {
// this callback will be called asynchronously
// when the response is available
			console.log(data);
			console.log(status);
			console.log(headers);
			console.log(config);
		}).
		error(function(data, status, headers, config) {
// called asynchronously if an error occurs
// or server returns response with an error status.
		 console.log(data);
		 console.log(status);
		 console.log(headers);
		 console.log(config);
		});;
    };

 });

})();

app.controller("homeController", function($scope,$http)
{
	// this.datos;
	$scope.nombre;
	$scope.apellido;
	$scope.email;
	//$scope.datos;
	$scope.datos = {};
    $http.get('/getData').success(function(data) 
    {
        $scope.datos = data.posts;//así enviamos los posts a la vista
    });

    $scope.agregarCliente = function(){


		console.log($scope.datos);

		 var cliente = {
            nombre: $scope.nombre,
            apellido: $scope.apellido,
            email: $scope.email,
            
        };

        // $scope.cliente = {};
        // $scope.cliente.nombre   = $scope.nombre;
        // $scope.cliente.apellido = $scope.apellido;
        // $scope.cliente.email    = $scope.email;

        $scope.datos.push(cliente);

        console.log($scope.datos);


        $http.post('/getData', cliente);
    };

});

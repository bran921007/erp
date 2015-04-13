(function(){

	var app = angular.module('distribuidor',[]);

	app.controller("distribuidorController", function($scope,$http){

		//===============
    //Abrir Modal

    $scope.showModal = false;
    $scope.agregarModal = function(){
      $scope.distribuidor = {};
        $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.distribuidor = {};
    $scope.datos = {};


    $http.get('/getDistribuidores').success(function(data)
    {
        $scope.datos = data.distribuidores;//así enviamos los posts a la vista
    });

    $scope.agregarDistribuidor = function(){

        //  var customer = {
        //     nombre:   $scope.distribuidor.nombre,
        //     apellido: $scope.distribuidor.apellido,
        //     email:    $scope.distribuidor.email

        // };
        //var distribuidor = $scope.distribuidor;

        $scope.datos.push($scope.distribuidor);

        $http.post('/postDistribuidor', $scope.distribuidor);

        $scope.distribuidor = {};
        $scope.showModal = false;

    };

    $scope.borrarDistribuidor = function(){

        $scope.showConfirmacion = false;

        var distribuidor = $scope.datoDistribuidor;

         var index = $scope.datos.indexOf(distribuidor);

        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        $http.delete('borrarDistribuidor/'+distribuidor.id);

    };

    $scope.editarDistribuidor = function (){
        $scope.editModal = false;

        $http.put('/editarDistribuidor/'+$scope.distribuidor.id, $scope.distribuidor);

    };


    $scope.bodyModal = "Estas seguro de que deseas borrar este distribuidor?";
    $scope.showConfirmacion = false;

    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoDistribuidor = {};
        $scope.datoDistribuidor = data;
    };

    $scope.editarModal = function(distribuidor){

        $scope.editModal = true;
        $scope.distribuidor = distribuidor;
        $scope.datoDistribuidor = {};
        $scope.datoDistribuidor = distribuidor;


    };

});

})();

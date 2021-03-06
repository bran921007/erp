(function(){

	var app = angular.module('clientes',[]);

	app.controller("clientesController", function($scope,$http,$modal,$log)
{
    //===============
    //Abrir Modal

    $scope.showModal = false;
    $scope.agregarModal = function(){
      $scope.cliente = {};
        $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.cliente = {};
    $scope.datos = {};


    $http.get('/getClientes').success(function(data)
    {
        $scope.datos = data.clientes;//así enviamos los posts a la vista
    });

    $scope.agregarCliente = function(){

        //  var customer = {
        //     nombre:   $scope.cliente.nombre,
        //     apellido: $scope.cliente.apellido,
        //     email:    $scope.cliente.email

        // };
        var customer = $scope.cliente;

        $scope.datos.push(customer);

        $http.post('/postClientes', customer);

        $scope.cliente = {};
        $scope.showModal = false;

    };

    $scope.borrarCliente = function(){

        $scope.showConfirmacion = false;

        var cliente = $scope.datoCliente;

         var index = $scope.datos.indexOf(cliente);

        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        $http.delete('borrarCliente/'+cliente.id);

    };

    $scope.editarCliente = function (){
        $scope.editModal = false;
        
        $http.put('/editarCliente/'+$scope.datoCliente.id, $scope.datoCliente);
        
    };


    $scope.bodyModal = "Estas seguro de que deseas borrar este cliente?";
    $scope.showConfirmacion = false;

    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoCliente = {};
        $scope.datoCliente = data;
    };

    $scope.editarModal = function(cliente){

        $scope.editModal = true;
        $scope.cliente = cliente;
        $scope.datoCliente = {};
        $scope.datoCliente = cliente;


    };


});

})();
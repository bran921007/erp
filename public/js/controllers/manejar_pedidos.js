(function(){

	var app = angular.module('manejar_pedidos',[]);

	app.controller("manejarPedidosController", function($scope,$http){

	$scope.showModal = false;

    $scope.agregarModal = function(){
      $scope.factura = {};
      $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.manejar = {};
    $scope.datos = {};

    $http.get('/getManejarPedidos').success(function(data)
    {
        $scope.datos = data.distribuidores;//así enviamos los posts a la vista
    });

    $scope.agregar = function(){

        var manejar_pedido = $scope.factura;

        $scope.datos.push(manejar_pedido);

        $http.post('/postManejarPedidos', manejar_pedido);

        $scope.manejar = {};
        $scope.showModal = false;

    };

    $scope.borrar = function(){

        $scope.showConfirmacion = false;

        var factura = $scope.datoFactura;

         var index = $scope.datos.indexOf(factura);

        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        $http.delete('borrarManejarPedidos/'+factura.id);

    };

    $scope.editar = function (){
        $scope.editModal = false;

        $http.put('/editarManejarPedidos/'+$scope.factura.id, $scope.factura);
    };

    $scope.bodyModal = "Estas seguro de que deseas borrar este distribuidor?";
    $scope.showConfirmacion = false;

    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoManejarPedido = {};
        $scope.datoManejarPedido = data;
    };

    $scope.editarModal = function(manejar_pedido){

        $scope.editModal = true;
        $scope.factura = manejar_pedido;
        $scope.datoManejarPedido = {};
        $scope.datoManejarPedido = manejar_pedido;


    };

});
	
})();
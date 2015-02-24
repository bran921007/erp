(function(){

	var app = angular.module('factura_pedidos',[]);

	app.controller("facturaPedidosController", function($scope,$http,$location){

    $scope.verFactura = function(pedido){

        $location.url("/factura/"+pedido.id);
    };


    $scope.showModal = false;
    $scope.agregarModal = function(){
      $scope.factura = {};
      $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.factura = {};
    $scope.datos = {};

    $http.get('/getPedido').success(function(data)
    {
        $scope.datos = data.pedidos;//así enviamos los posts a la vista
        
        console.log($scope.datos);
    });

    $scope.agregar = function(){

        var factura = $scope.factura;

        $scope.datos.push(factura);

        $http.post('/postFactura', factura);

        $scope.factura = {};
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
        $http.delete('borrarFactura/'+factura.id);

    };

    $scope.editar = function (){
        $scope.editModal = false;

        $http.put('/editarFactura/'+$scope.factura.id, $scope.factura);   
    };

    $scope.bodyModal = "Estas seguro de que deseas borrar este distribuidor?";
    $scope.showConfirmacion = false;

    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoFactura = {};
        $scope.datoFactura = data;
    };

    $scope.editarModal = function(factura){

        $scope.editModal = true;
        $scope.factura = factura;
        $scope.datoFactura = {};
        $scope.datoFactura = factura;


    };

});
	
})();
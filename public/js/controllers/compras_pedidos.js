(function(){

	var app = angular.module('compras_pedidos',[]);

	app.controller("comprasPedidosController", function($scope,$http){

  // getCompraPedidos
  // postCompraPedidos
  // editarCompraPedidos
  // borrarCompraPedidos

	$scope.showModal = false;
  $scope.compra = {};

    $scope.agregarModal = function(){

      $scope.compra.distribuidor =0;
      $scope.compra.articulo     =0;
      $scope.compra.cantidad     =0;
      $scope.compra.total        =0;

      $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.manejar = {};
    $scope.datos = {};

    $http.get('/getCompraPedidos').success(function(data)
    {
        $scope.datos = data.compras;//así enviamos los posts a la vista
    });

    // compra.distribuidor
    // compra.articulo
    // compra.cantidad
    // compra.total

    $scope.agregar = function(){

        var compra_pedido = {
          id_articulo:    $scope.compra.articulo,
          id_distribuidor:$scope.compra.distribuidor,
          cantidad:       $scope.compra.cantidad,
          total:          $scope.compra.total

        };

        $http.post('/postCompraPedidos', compra_pedido).success(function(data){
          $scope.datos.push(compra_pedido);

        });

        $scope.manejar = {};
        $scope.showModal = false;

    };

    $scope.borrar = function(){

        $scope.showConfirmacion = false;

        var compra = $scope.datoFactura;

         var index = $scope.datos.indexOf(compra);

        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        $http.delete('borrarManejarPedidos/'+compra.id);

    };

    $scope.editar = function (){
        $scope.editModal = false;

        $http.put('/editarManejarPedidos/'+$scope.compra.id, $scope.compra);
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

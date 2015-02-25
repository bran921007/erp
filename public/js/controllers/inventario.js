(function(){

    var app = angular.module('inventario',[]);

app.controller("inventarioController", function($scope,$http){

//===============
    //Abrir Modal
    $scope.notificacion = false;
    $scope.showModal = false;
    $scope.agregarModal = function(){
        $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.producto = {};
    $scope.datos = {};


    $http.get('/getProductos').success(function(data)
    {
        $scope.datos = data.productos;//así enviamos los posts a la vista
    });

    $scope.agregarProducto = function(){

         var inventario = {
            articulo:   $scope.producto.articulo,
            cantidad:   $scope.producto.cantidad,
            categoria:  $scope.producto.categoria,
            precioVenta:$scope.producto.precioVenta,
            precioCompra:$scope.producto.precioCompra,
            distribuidor:$scope.producto.distribuidor

        };

        $scope.datos.push(inventario);

        $http.post('/postProductos', inventario);

        $scope.producto = {};
        $scope.showModal = false;

    };

    $scope.borrarProducto = function(){

        $scope.showConfirmacion = false;
        var producto = $scope.datoProducto;
        var index = $scope.datos.indexOf(producto);

        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        // var id = producto.articulo;
        $http.delete('borrarProducto/'+producto.id);

    };

    $scope.editarStock = function(){

        console.log($scope.producto);
        // $scope.datos.indexOf($scope.producto);
        
        var id_articulo = $scope.producto.articulo;

        var stock = {
            cantidad: $scope.producto.cantidad
        };
        
        $http.put('/editarProducto/'+id_articulo, stock).success(function(data){
            //if(data.success == 'true'){
                $scope.notificacion = true;
                $scope.msg = data.msg;
                // var index = $scope.datos.indexOf($scope.producto);
                // if(index != -1){
                    $scope.datos[$scope.producto.articulo-1].cantidad = $scope.producto.cantidad;
                // }

           // }

        });
    };

    $scope.editarProducto = function(){

        $scope.editModal = false;
        $http.put('/editarProducto/'+$scope.datoProducto.id, $scope.datoProducto);
    };

    $scope.bodyModal = "Estas seguro de que deseas borrar este articulo?";
    $scope.showConfirmacion = false;
    
    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoProducto = {};
        $scope.datoProducto = data;
    };

    $scope.editarModal = function(producto){

        $scope.editModal = true;
        $scope.producto = producto;
        $scope.datoProducto = {};
        $scope.datoProducto = producto;
    };


});


})();

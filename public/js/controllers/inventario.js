(function(){

    var app = angular.module('inventario',[]);

app.controller("inventarioController", function($scope,$http){

//===============
    //Abrir Modal

    $scope.showModal = false;
    $scope.agregarModal = function(){
        $scope.showModal = !$scope.showModal;
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
        console.log(producto.id);
        $http.delete('borrarProducto/'+producto.id);

    };

    $scope.editarProducto = function(producto){

        $scope.showModal = true;
        $scope.producto = producto;

    };


    $scope.bodyModal = "Estas seguro de que deseas borrar este articulo?";
    $scope.showConfirmacion = false;
    
    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoProducto = {};
        $scope.datoProducto = data;
    };



});


})();
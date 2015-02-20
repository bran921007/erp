(function(){

    var app = angular.module('controllers',[]);

app.controller("homeController", function($scope,$http,$modal,$log)
{
    //===============
    //Abrir Modal
   
    $scope.showModal = false;
    $scope.agregarModal = function(){
        $scope.showModal = !$scope.showModal;
    };
    //=====================

    $scope.cliente = {};
    $scope.datos = {};


    $http.get('/getClientes').success(function(data)
    {
        $scope.datos = data.clientes;//así enviamos los posts a la vista
    });

    $scope.agregarCliente = function(){

         var customer = {
            nombre:   $scope.cliente.nombre,
            apellido: $scope.cliente.apellido,
            email:    $scope.cliente.email
            
        };
        
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
        console.log(cliente.id);
        $http.delete('borrarCliente/'+cliente.id);

    };


    $scope.bodyModal = "Estas seguro de que deseas borrar este articulo?";
    $scope.showConfirmacion = false;
    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoCliente = {};
        $scope.datoCliente = data;
    };

    $scope.editarCliente = function(cliente){

        $scope.showModal = false;
        $scope.cliente = cliente;
        

    };


});


app.controller("dashboardController", function($scope,$http)
{
});

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

app.controller("tabsController", function($scope)
{
  $scope.fecha = Date.now();
});

})();



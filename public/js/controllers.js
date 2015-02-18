(function(){

    var app = angular.module('controllers',[]);

app.controller("homeController", function($scope,$http)
{
    $scope.cliente = {};

    $http.get('/getData').success(function(data) 
    {
        $scope.datos = data.posts;//así enviamos los posts a la vista
    });

    $scope.agregarCliente = function(){

         var customer = {
            nombre:   $scope.cliente.nombre,
            apellido: $scope.cliente.apellido,
            email:    $scope.cliente.email
            
        };
        
        $scope.datos.push(customer);

        $http.post('/getData', customer);

        $scope.cliente = {};

    };

    $scope.borrarCliente = function(cliente){

         var index = $scope.datos.indexOf(cliente);

         
        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        console.log(cliente.id);
        $http.delete('borrarCliente/'+cliente.id);

        

    };

    $scope.abrirModal = function(size){
       

        var modalInstance = $modal.open({
          templateUrl: 'myModalContent.html',
          controller: 'ModalInstanceCtrl',
          size: size,
          resolve: {
            items: function () {
              return $scope.items;
            }
          }

        });
    };
    $scope.editarCliente = function(cliente){

        // this.nombre   = cliente.nombre; 
        // this.apellido =
        // this.email    =
        $scope.cliente = cliente;


    };

});

app.controller('ModalInstanceCtrl', function($scope, $http){
});

app.controller("dashboardController", function($scope,$http)
{
});

app.controller("tabsController", function($scope)
{
  $scope.fecha = Date.now();
});

})();



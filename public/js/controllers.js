(function(){

    var app = angular.module('controllers',[]);

app.controller("homeController", function($scope,$http)
{

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

});

})();



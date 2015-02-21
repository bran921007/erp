(function(){

var app = angular.module("app", ['ngRoute','controllers', 'app-directives','ui.bootstrap.modal']);


app.config(function($routeProvider)
{
    $routeProvider.when("/", {
      templateUrl : "../templates/dashboard.html",
      controller : "dashboardController"
    })
    .when("/dashboard", {
      templateUrl : "../templates/dashboard.html",
      controller : "dashboardController"
    })
    .when("/clientes",{
        templateUrl: "../templates/clientes.html",
        controller: "clientesController"
    })
    .when("/pedidos",{
      templateUrl : "../templates/pedidos.html",
      controller : "pedidosController"
    })    
	 .when("/inventario",{
	  templateUrl : "../templates/inventario.html",
	  controller : "inventarioController"
    })
	.when("/informe",{
	    templateUrl : "../templates/informe.html",
      controller : "informeController"
	})
	.otherwise({reditrectTo:"/"});

});

})();

// app.controller("homeController", function homeController($scope,$http)
// {

//     $http.get('/getData').success(function(data)
//     {

//         $scope.datos = data.posts;//así enviamos los posts a la vista
//     });
// });

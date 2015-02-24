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
  .when("/distribuidor",{
      templateUrl : "../templates/distribuidor.html",
      controller : "distribuidorController"
  })
  .when("/categoria",{
      templateUrl : "../templates/categoria.html",
      controller : "categoriaController"
  })
  .when("/factura/:id",{
      templateUrl : "../templates/factura.html",
      controller : "facturaController"
  })
  .when("/factura-pedidos",{
      templateUrl : "../templates/factura_pedidos.html",
      controller : "facturaPedidosController"
  })
  .when("/manejar-pedidos",{
      templateUrl : "../templates/manejar_pedidos.html",
      controller : "manejarPedidosController"
  })
  .when("/configuracion",{
    templateUrl : "../templates/configuracion.html",
    controller : "configuracionController"
  })
 //  .when("/login",{

 //      controller : "authController"
	// })
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

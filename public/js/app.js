(function(){

var app = angular.module("app", ['ngRoute','controllers', 'app-directives']);


app.config(function($routeProvider)
{
    $routeProvider.when("/clientes",{
 		templateUrl: "../templates/home.html",
        controller: "homeController"
    })
    .when("/", {
      templateUrl : "../templates/clientes.html",
      controller : "clientesController"
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

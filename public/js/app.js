
var app = angular.module("app", ['ngRoute']);

 
app.config(function($routeProvider)
{
 
    $routeProvider.when("/", 
    {
 		templateUrl: "../templates/home.html",
        controller: "homeController"
       
 
    }).otherwise({reditrectTo:"/"});
 
});

// app.controller("homeController", function homeController($scope,$http)
// {

//     $http.get('/getData').success(function(data) 
//     {

//         $scope.datos = data.posts;//así enviamos los posts a la vista
//     });
// });

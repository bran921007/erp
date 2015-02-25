// (function(){

// 	var app = angular.module('login',[]);

//     app.controller("authController", function($scope,$http){

//      	$scope.registro = {};

// 		$scope.registrar = function($event)
// 		{
// 			$event.preventDefault();

// 			console.log($scope.registro);
// 			$http.post('/registrar',$scope.registro);
//         };

// 	    $scope.acceso = {};

//     $scope.login = function($event)
//     {
//     	$event.preventDefault();

//     	var log ={
//     		email:     $scope.acceso.email,
//     		password:  $scope.acceso.password
//     	};
//     	console.log(log);

//     	$http.post('/login',$scope.acceso).success(function(data) {
//             if(data.success == false){
//               //$location.url("/login");
//             }else{
//               //$location.url("/dashboard");
//             }
        			
// 		}).
// 		error(function(data, status, headers, config) {
// // called asynchronously if an error occurs
// // or server returns response with an error status.
// 		      console.log("login no funciono");
// 		});
//      };

//  });


// })();
(function(){
  var login = angular.module('login-controller',['app-services','ngRoute','ngSanitize','ngResource']);

  login.controller("loginController",function($scope,$sanitize,$location,Authenticate,Flash,$rootScope,SessionService,$http){
    $rootScope.isActive = function() {
      if ($location.path() === '/') {return $rootScope.clase = 'login-body';}
      if($location.path() != '/'){return  $rootScope.clase = 'boxed-page' ;}
    };

    if(SessionService.get('authenticated')){
      $location.url('/dashboard');
    }


    // Autentificacion Verificacion
    $scope.login = true;
    $scope.verificacion = false;

    $scope.otrosOpcionesLogin = false;
    $scope.masOpcionesLogin = function(){
      $scope.otrosOpcionesLogin = !$scope.otrosOpcionesLogin;
    }

    $scope.danger = false;

    $scope.data = {};

    $scope.generarCodigo = function(user){
      console.log($scope.data.name);
      var id_user = {user:user}
      $http.post('/service/solicitarCodigo', id_user).success(function(data){
        $scope.telefono = data.numero;
        console.log(data);
      });
    };

    $scope.verificarCodigo = function(){
      var codigo = {codigo:$scope.codigo};
      $http.post('/service/verificarCodigo', codigo).success(function(data){
        console.log(data);
        if(data.success==true){
          $location.path('/dashboard');
          Flash.clear();
          SessionService.set('authenticated',true);
          SessionService.set('name',$scope.data.name);
          SessionService.set('last',$scope.data.last);
          SessionService.set('id',$scope.data.id);
        }
        else{
          alert('Codigo Denegado');
        }
      });
    };

    // END ----------------------

    $scope.submit = function(){
      Authenticate.save({
        'email': $sanitize($scope.email),
        'password': $sanitize($scope.password)
      },function(resource) {
        $scope.data = resource.user;
        if(resource.user.auth=='true'){
          $scope.login = !$scope.login;
          $scope.verificacion = !$scope.verificacion;
          $scope.generarCodigo(resource.user.id);
        }else if(resource.user.auth=='false'){
          $location.path('/dashboard');
          Flash.clear();
          SessionService.set('authenticated',true);
          SessionService.set('name',$scope.data.name);
          SessionService.set('last',$scope.data.last);
          SessionService.set('id',$scope.data.id);
        }else{

        }




      },function(response){
        //Flash.show(response.flash)
      });
    }

  });

})();

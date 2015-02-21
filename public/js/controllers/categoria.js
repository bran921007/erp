(function(){

	var app = angular.module('categoria',[]);

	app.controller("categoriaController", function($scope,$http){

	//===============
    //Abrir Modal

    $scope.showModal = false;
    $scope.agregarModal = function(){
      $scope.cliente = {};
        $scope.showModal = !$scope.showModal;
    };
    $scope.toggleModal = function(){
        $scope.showConfirmacion = !$scope.showConfirmacion;
    };
    //=====================

    $scope.categoria = {};
    $scope.datos = {};


    $http.get('/getCategorias').success(function(data)
    {
        $scope.datos = data.categorias;//así enviamos los posts a la vista
    });

    $scope.agregarCategoria = function(){

         var categoria = {
            titulo:         $scope.categoria.titulo,
            descripcion:    $scope.categoria.descripcion
        };

        $scope.datos.push(categoria);

        $http.post('/postCategoria', categoria);

        $scope.categoria = {};
        $scope.showModal = false;

    };

    $scope.borrarCategoria = function(){

        $scope.showConfirmacion = false;

        var categoria = $scope.datoCategoria;

         var index = $scope.datos.indexOf(categoria);

        if (index != -1) {
            // Remove todo-item from array
            $scope.datos.splice( index, 1 );
        }

        // // Now remove todo-items from laravel
        console.log(categoria.id);
        $http.delete('borrarCategoria/'+categoria.id);

    };


    $scope.bodyModal = "Estas seguro de que deseas borrar esta categoria?";
    $scope.showConfirmacion = false;
    $scope.confirmacionModal = function(data){
        $scope.showConfirmacion = !$scope.showConfirmacion;
        $scope.datoCategoria = {};
        $scope.datoCategoria = data;
    };

    $scope.editarCategoria = function(categoria){

        $scope.showModal = false;
        $scope.categoria = categoria;
        

    };

});
	
})();
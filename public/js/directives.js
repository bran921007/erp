(function(){
  var app = angular.module('app-directives', []);

  //directive "main-sidebar"
  app.directive("mainSidebar", function(){
    return {
      restrict: "E",
      templateUrl: "../templates/partials/main-sidebar.html"
    };
  });


})();

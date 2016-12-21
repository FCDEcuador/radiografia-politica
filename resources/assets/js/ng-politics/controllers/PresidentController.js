var controllers = require('../controllers.js').controllers;
controllers.controller('PresidentController', function($scope, President) {
    $scope.binomials = [];

    init();

    function init()
    {
      $scope.binomails = President.all();
      console.log($scope.binomails);
    }
    
});

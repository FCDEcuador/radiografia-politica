var controllers = require('../controllers.js').controllers;
controllers.controller('PresidentController', function($scope, President) {
    $scope.binomials = [];

    init();

    function init()
    {
     President.all().then(function(data)
    {
      console.log(data);
      $scope.binomails = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

var controllers = require('../controllers.js').controllers;
controllers.controller('EjecutiveController', function($scope, Ejecutive) {
    $scope.ejecutives = [];

    init();

    function init()
    {
     Ejecutive.all().then(function(data)
    {
      console.log(data);
      $scope.ejecutives = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

var controllers = require('../controllers.js').controllers;
controllers.controller('JudicialController', function($scope, Judicial) {
    $scope.judicials = [];

    init();

    function init()
    {
     Judicial.all().then(function(data)
    {
      console.log(data);
      $scope.judicials = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

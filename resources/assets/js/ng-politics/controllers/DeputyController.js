var controllers = require('../controllers.js').controllers;
controllers.controller('DeputyController', function($scope, Deputy) {
    $scope.deputys = [];

    init();

    function init()
    {
     Deputy.all().then(function(data)
    {
      console.log(data);
      $scope.deputys = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

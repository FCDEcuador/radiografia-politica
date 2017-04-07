var controllers = require('../controllers.js').controllers;
controllers.controller('LegistativeController', function($scope, Legislative) {
    $scope.legislatives = [];

    init();

    function init()
    {
     Legislative.all().then(function(data)
    {
      console.log(data);
      $scope.legislatives = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

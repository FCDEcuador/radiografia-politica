var controllers = require('../controllers.js').controllers;
controllers.controller('ElectoralController', function($scope, Electoral) {
    $scope.electorals = [];

    init();

    function init()
    {
     Electoral.all().then(function(data)
    {
      console.log(data);
      $scope.electorals = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

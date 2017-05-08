var controllers = require('../controllers.js').controllers;
controllers.controller('PrincipalController', function($scope, Principal) {
    $scope.principals = [];

    init();

    function init()
    {
     Principal.all().then(function(data)
    {
      console.log(data);
      $scope.principals = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

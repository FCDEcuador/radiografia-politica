var controllers = require('../controllers.js').controllers;
controllers.controller('OtherAuthoritiesController', function($scope, OtherAuthorities) {
    $scope.others = [];

    init();

    function init()
    {
     OtherAuthorities.all().then(function(data)
    {
      console.log(data);
      $scope.others = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

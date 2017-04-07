var controllers = require('../controllers.js').controllers;
controllers.controller('CitizenParticipationController', function($scope, CitizenParticipation) {
    $scope.citizens = [];

    init();

    function init()
    {
     CitizenParticipation.all().then(function(data)
    {
      console.log(data);
      $scope.citizens = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

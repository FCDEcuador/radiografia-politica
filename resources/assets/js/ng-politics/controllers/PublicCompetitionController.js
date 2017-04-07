var controllers = require('../controllers.js').controllers;
controllers.controller('PublicCompetitionController', function($scope, PublicCompetition) {
    $scope.publics = [];

    init();

    function init()
    {
     PublicCompetition.all().then(function(data)
    {
      console.log(data);
      $scope.publics = data;
    }).catch(function(err)
  {
    console.error(err);
  });

    }

});

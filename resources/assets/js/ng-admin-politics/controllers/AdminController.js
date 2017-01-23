var controllers = require('../controllers.js').controllers;
controllers.controller('AdminController', function($scope, Admin) {
    $scope.data = {};

    init();

    function init()
    {
      Admin.dashboard().then(function(res){
        console.log(res);
        $scope.data = res;
      }).catch(function(err){
        console.error(err);
      });

    }

});

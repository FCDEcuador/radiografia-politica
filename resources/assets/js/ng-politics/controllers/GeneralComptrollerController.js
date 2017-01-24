var controllers = require('../controllers.js').controllers;
controllers.controller('GeneralComptrollerController',function($scope,GeneralComptroller){
  $scope.generalComptrollers = [];

  init();

  function init(){
    GeneralComptroller.all().then(function(res){
      console.log(res);
      $scope.generalComptrollers = res;
    }).catch(function(error){
      console.error(error);

    });
  };

});

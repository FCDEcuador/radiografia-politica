var controllers = require('../controllers.js').controllers;

controllers.controller('OmbudsmanController',function($scope,Ombudsman){
  $scope.ombudsmen = [];

  init();

  function init(){
    Ombudsman.all().then(function(res){
      console.log(res);
      $scope.ombudsmen = res;
    }).catch(function(error){
      console.error(error);

    });
  };

});

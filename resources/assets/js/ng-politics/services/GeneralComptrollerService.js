var services = require('../services').services;

services.service('GeneralComptroller', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/generalComptrollers').then(function(res){
        return res.data;
      });
    }
  };
});

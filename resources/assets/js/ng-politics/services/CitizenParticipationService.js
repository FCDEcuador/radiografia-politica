var services = require('../services').services;

services.service('CitizenParticipation', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/citizens').then(function(res){
        return res.data;
      });
    }
  };

});

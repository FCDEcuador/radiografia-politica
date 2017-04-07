var services = require('../services').services;

services.service('PublicCompetition', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/publics').then(function(res){
        return res.data;
      });
    }
  };

});

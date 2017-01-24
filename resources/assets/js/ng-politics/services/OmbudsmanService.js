var services = require('../services').services;

services.service('Ombudsman', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/ombudsmen').then(function(res){
        return res.data;
      });
    }
  };
});

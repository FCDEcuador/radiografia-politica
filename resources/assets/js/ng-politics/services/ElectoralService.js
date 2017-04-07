var services = require('../services').services;

services.service('Electoral', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/electorals').then(function(res){
        return res.data;
      });
    }
  };

});

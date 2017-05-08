var services = require('../services').services;

services.service('Principal', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/principals').then(function(res){
        return res.data;
      });
    }
  };

});

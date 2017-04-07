var services = require('../services').services;

services.service('Ejecutive', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/ejecutives').then(function(res){
        return res.data;
      });
    }
  };

});

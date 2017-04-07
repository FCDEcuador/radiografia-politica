var services = require('../services').services;

services.service('Judicial', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/judicials').then(function(res){
        return res.data;
      });
    }
  };

});

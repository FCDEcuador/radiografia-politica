var services = require('../services').services;

services.service('Legislative', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/legislatives').then(function(res){
        return res.data;
      });
    }
  };

});

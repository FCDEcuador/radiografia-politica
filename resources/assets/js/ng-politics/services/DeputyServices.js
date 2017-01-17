var services = require('../services').services;

services.service('Deputy', function($http){
  var server = "http://"+location.hostname;

  return {
    all: function(){
      return $http.get(server + '/api/deputys/true').then(function(res){
        return res.data;
      });
    }
  };

});

var services = require('../services').services;

services.service('Deputy', function($http){
  var server = "http://localhost:8000";

  return {
    all: function(){
      return $http.get(server + '/api/deputys/true').then(function(res){
        return res.data;
      });
    }
  };

});

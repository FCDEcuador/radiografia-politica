var services = require('../services').services;

services.service('OtherAuthorities', function($http){
  var server = "http://"+location.host;

  return {
    all: function(){
      return $http.get(server + '/api/others').then(function(res){
        return res.data;
      });
    }
  };

});

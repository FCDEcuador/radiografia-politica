var services = require('../services').services;

services.service('Admin', function($http){
  var server = "http://"+location.host;

  return {
    dashboard: function(){
      return $http.get(server + '/api/admin/dashboard').then(function(res){
        return res.data;
      });
    }
  };

});

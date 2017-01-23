
var app = angular.module('admin-politics', [
  'admin-politics.controllers',
  'admin-politics.services'
],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
});

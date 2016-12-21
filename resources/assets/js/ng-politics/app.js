
var app = angular.module('politics', [
  'politics.controllers',
  'politics.services'
],function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
});

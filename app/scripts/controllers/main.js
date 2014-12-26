'use strict';

/**
 * @ngdoc function
 * @name sirtfrontendApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the sirtfrontendApp
 */
angular.module('sirtfrontendApp')
  .controller('MainCtrl',[ '$scope','AuthenticationService', '$location',function ($scope, AuthenticationService, $location) {
   
    $scope.logout = function() {
    	AuthenticationService.logout().success(function() {
    		$location.path('/login');
    	});
    };
  }]);

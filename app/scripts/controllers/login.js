'use strict';

/**
 * @ngdoc function
 * @name sirtfrontendApp.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the sirtfrontendApp
 */
angular.module('sirtfrontendApp')
  .controller('LoginCtrl', ['$scope', 'AuthenticationService','SessionService','$location',  function ($scope, AuthenticationService, SessionService, $location) {
    $scope.credentials = { username: '', password:''};

    $scope.login = function() {
    	AuthenticationService.login($scope.credentials).success(function() {
    		$location.path('/home');
    	});
    };
  }]);

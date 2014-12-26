'use strict';

/**
 * @ngdoc overview
 * @name sirtfrontendApp
 * @description
 * # sirtfrontendApp
 *
 * Main module of the application.
 */
angular
  .module('sirtfrontendApp', [
    'ngAnimate',
    'ngAria',
    'ngCookies',
    'ngMessages',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(['$compileProvider', '$routeProvider', '$locationProvider',function ($compileProvider, $routeProvider, $locationProvider) {
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(https?|ftp|mailto|file|tel):/);
    $routeProvider
      .when('/home', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl',
        requireLogin: true
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl'
      })
      .when('/login', {
        templateUrl:'views/login.html',
        controller:'LoginCtrl',
        requireLogin: false
      })
      .when('/posts', {
        templateUrl: 'views/posts.html',
        controller: 'PostsController',
        resolve: {
          posts : function(PostService) {
            return PostService.get();
          }
        }
      })
      .otherwise({
        redirectTo: '/login'
      });
      
  }]);

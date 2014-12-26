'use strict';

angular.module('sirtfrontendApp')
  .factory('AuthenticationService', ['$http', '$location','$sanitize', 'SessionService', 'FlashService','CSRF_TOKEN',function($http, $location,$sanitize, SessionService, FlashService, CSRF_TOKEN) {
    var cacheSession = function() {
      SessionService.set('authenticated', true);
    };
    var uncacheSession = function() {
      SessionService.unset('authenticated');
    }	;
    var loginError = function(response) {
      FlashService.show(response.flash);
    };
   var sanitizeCredentials = function(credentials) {
    return {
      email: $sanitize(credentials.email),
      password: $sanitize(credentials.password),
      csrf_token: CSRF_TOKEN
    };
  };
    return {
  		login: function(credentials) {
              console.log(sanitizeCredentials(credentials));
  		  var login =  $http.post('/api/v1/auth/login',  sanitizeCredentials(credentials));
                login.success(cacheSession);
                login.success(FlashService.clear);
                login.error(loginError);
                return login;
  		},
  		logout: function() {
  		  var logout =  $http.get('/api/v1/auth/logout');
                logout.success(uncacheSession);
                return logout;
  		},
            isLoggedIn: function() {
              return SessionService.get('authenticated'); 
            }
  	};
  }]);
'use strict';
angular.module('sirtfrontendApp').config(['$httpProvider',function($httpProvider) {
	var logsOutUserOn401 = function($location, $q, SessionService, FlashService) {
		var success = function(response) {
			return response;
		};
		var error = function(response) {
			if(response.status === 401) {
				SessionService.unset('authenticated');
				$location.path('/login');
				console.log('test');
				FlashService.show(response.data.flash);
				return $q.reject(response);
			} else {
				return $q.reject(response);
			}
		};

		return function(promise) {
			return promise.then(success, error);
		};
	};
	
}]);


//   angular.module('sirtfrontendApp')
//   .factory('authHttpResponseInterceptor',['$q','$location',function($q,$location){
//     return {
//         response: function(response){
//             if (response.status === 401) {
//                 console.log('Response 401');
//             }
//             return response || $q.when(response);
//         },
//         responseError: function(rejection) {
//             if (rejection.status === 401) {
//                 console.log('Response Error 401',rejection);
//                 $location.path('/login').search('returnTo', $location.path());
//             }
//             return $q.reject(rejection);
//         }
//     };
// }])
// .config(['$httpProvider',function($httpProvider) {
//     //Http Intercpetor to check auth failures for xhr requests
//     $httpProvider.interceptors.push('authHttpResponseInterceptor');
// }]);

/* exported event, next, current */
angular.module('sirtfrontendApp')
  .run(['$rootScope','$location', 'AuthenticationService', 'FlashService', function($rootScope, $location, AuthenticationService, FlashService){
   // var routesThatRequireAuth  = ['/home'];
    $rootScope.$on('$routeChangeStart', function(event, next, current) {
    	if(next.requireLogin && !AuthenticationService.isLoggedIn()) {
    		$location.path('/login');
    		FlashService.show('Please log in to continue');
    	}
    });
  }]);
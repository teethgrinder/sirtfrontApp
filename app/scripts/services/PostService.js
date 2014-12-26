'use strict';

angular.module('sirtfrontendApp').factory('PostService', function($http) {
  return {
    get: function() {
      return $http.get('api/v1/posts');
    }
  };
});

// public/js/services/commentService.js

// angular.module('postService', [])

// .factory('Post', function($http) {

//     return {
//         // get all the comments
//         get : function() {
//             return $http.get('/api/v1/posts');
//         }
//       };
// });

'use strict';

angular.module('sirtfrontendApp').controller('PostsController', function($scope, posts) {
console.log(posts.data);
  $scope.posts = posts.data.data;
});
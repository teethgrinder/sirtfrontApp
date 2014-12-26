'use strict';
angular.element(document).ready(function() {

  var app = angular.module('sirtfrontendApp');

  $.ajax({method: 'GET', type: 'json', url: 'api/v1/auth/csrf_token'}).then(function(response) {
    app.constant('CSRF_TOKEN', response.csrf_token);
    console.log(response.csrf_token);
    angular.bootstrap(document, ['sirtfrontendApp']);
  });

});
var app = angular.module('myApp', []);
app.controller('LoginController', function($scope, $http, $window) {
  $scope.loginError = '';

  $scope.login = function() {
    // Clear any previous error message
    $scope.loginError = '';

    // Send POST request to login.php
    $http.post('login.php', {
      username: $scope.username,
      password: $scope.password
    }).then(function(response) {
      if (response.data.success) {
        // Redirect to home.html on successful login
        $window.location.href = 'home.html';
      } else {
        // Display error message if credentials are invalid
        $scope.loginError = response.data.message || 'Invalid username or password';
      }
    }, function(error) {
      // Handle server or request errors
      console.log(error);
      $scope.loginError = 'An error occurred. Please try again.';
    });
  };
});

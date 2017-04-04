MYSITE.controller('UserCtrl', function ($scope, Service) {
  $scope.data = {
    username: '',
    password: ''
  };
  $scope.registerData = {
    username: '',
    email: '',
    password: ''
  };
  $scope.login = function () {
    Service.login($scope.data).then(function (res) {
      console.log('login', res);
    });
  };
  $scope.register = function () {
    Service.register($scope.registerData).then(function (res) {
      console.log('register', res);
    });
  };
});
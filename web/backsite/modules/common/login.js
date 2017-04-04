MYSITE.controller('LoginCtrl', function ($scope, $rootScope, Service, $state) {
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
      if (res.data.result) {
        $state.go('homeManage');
        $rootScope.username = $scope.data.username;
      }
    });
  };
  $scope.register = function () {
    Service.register($scope.registerData).then(function (res) {
      console.log('register', res);
      if (res.data.result) {
        alert('注册成功，请登录');
      }
    });
  };
});
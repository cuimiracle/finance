MYSITE.controller('LoginCtrl', function ($scope, Service, $state) {
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
      if (res.data.result == 'true') {
        $state.go('homeManage');
      }
    });
  };
  $scope.register = function () {
    Service.register($scope.registerData).then(function (res) {
      console.log('register', res);
      if (res.data.result == 'true') {
        alert('注册成功，请登录');
      }
    });
  };
});
MYSITE.controller('LoginCtrl', function ($scope, $rootScope, Service, Auth, $state) {
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
    Auth.login($scope.data).then(function (res) {
      console.log('login', res);
      if (res) {
        $rootScope.$broadcast('login.success');
        $rootScope.username = Auth.current();
        $state.go('homeManage');
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
}).controller('LogoutCtrl', function ($rootScope, $scope, Auth) {
  $scope.logout = function () {
    Auth.logout().then(function () {
      $rootScope.username = '';
      $state.go('login');
    })
  }
})
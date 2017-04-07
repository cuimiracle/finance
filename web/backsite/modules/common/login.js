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
      // console.log('login', res);
      $rootScope.$broadcast('login.success');
      $rootScope.username = Auth.current();
      $state.go('homeManage');
    });
  };
}).controller('LogoutCtrl', function ($rootScope, $scope, $state, Auth) {
  $scope.logout = function () {
    Auth.logout().then(function () {
      $rootScope.username = '';
      $state.go('login');
    })
  }
})
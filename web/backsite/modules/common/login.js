MYSITE.controller('LoginCtrl', function ($scope, $rootScope, Auth, $state) {
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
}).factory('Auth', function ($http, $q, $rootScope, $state) {
  function Auth() {
    this.auth = {username: null};
  }
  Auth.prototype.getCurrentUser = function () {
    var self = this;
    return $http.get('../index.php?r=back/is-login').success(function (res) {
      if (res.data.is_login == 1) {
        self.set(res.data.username);
        $rootScope.$broadcast('login.success');
      } else {
        self.set(null);
        $state.go('login');
      }
    })
  };
  Auth.prototype.current = function () {
    return this.auth.username;
  }
  Auth.prototype.isAuthed = function () {
    return this.auth.username != null;
  };
  Auth.prototype.set = function (username) {
    this.auth.username = username;
  };
  Auth.prototype.login = function (data) {
    var self = this;
    $http.post('../index.php?r=back/login', data).then(function (res) {
      return self.getCurrentUser();
    }, function () {
      console.log('登录不成功');
      return false;
    })
  }
  Auth.prototype.logout = function () {
    var self = this;
    return $http.get('../index.php?r=back/logout').then(function () {
      self.set(null);
    });
  }
}).factory('checkAuth', function (Auth, $q, $rootScope, $state) {
  return {
    check: function () {
      var deferred = $q.defer();
      Auth.getCurrentUser().then(function () {
        if (!Auth.isAuthed()) {
          deferred.reject();
          $state.go('login');
        } else {deffered.resolve();}
      }, function () {
        deferred.reject();
      });
      return deferred.promise;
    }
  }
});
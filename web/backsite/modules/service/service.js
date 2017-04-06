MYSITE.service('Service', function ($http, $q) {
  var urlPre = '../index.php?r=',
    self = this;

  this.getAllData = function (controllerName) {
    return $http.get(urlPre + controllerName+ '/get_all');
  };

  this.getData = function (controllerName, data) {
    return $http.get(urlPre + controllerName + '/get', {
      params: {id: data.id}
    });
  };

  this.addData = function (controllerName, data) {
    return $http.post(urlPre + controllerName + '/insert', data);
  };

  this.updateData = function (controllerName, data) {
    return $http.post(urlPre + controllerName + '/update', data);
  };

  this.deleteData= function (controllerName, data) {
    return $http.post(urlPre + controllerName + '/delete', {id: data.id})
  };

  this.register = function (data) { // username password email
    return $http.post(urlPre + 'back/register', data);
  };

  this.method = {
    getAll: function (scope, controllerName, areaName) {
      self.getAllData(controllerName).then(function (res) {
        scope[areaName + 'List'] = res.data.data;
      });
    },

    add: function (scope, controllerName, areaName, data, callback) {
      self.addData(controllerName, data).then(function (res) {
        if (res.data.insert_id) { // success
          callback();
        }
      });
    },

    update: function (scope, controllerName, areaName, data, callback) {
      self.updateData(controllerName, data).then(function (res) {
        callback();
      });
    },

    del: function (scope, controllerName, areaName, data, callback) {
      self.deleteData(controllerName, data).then(function (res) {
        callback();
      });
    }
  }
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
    return $http.post('../index.php?r=back/login', data).then(function (res) {
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
  return new Auth();
}).factory('CheckAuth', function (Auth, $q, $rootScope, $state) {
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
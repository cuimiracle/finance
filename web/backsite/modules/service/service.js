MYSITE.service('Service', function ($http) {
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

  this.login = function (data) { // username password
    return $http.post(urlPre + 'back/login', data);
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
});
MYSITE.service('Service', function ($http) {
  var urlPre = '../index.php?r=';

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

  this.method = {
    getAll: function (scope, controllerName, listName) {
      this.getAllData(controllerName).then(function (res) {
        scope[listName + 'list'] = res.data.data
      });
    }
  }
});
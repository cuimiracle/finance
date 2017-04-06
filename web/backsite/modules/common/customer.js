/**
 * 用户管理
 */
MYSITE.controller('CustomerCtrl', function ($scope, Service,PageMap, CUSTOMER) {
  var customerContents = PageMap.customer;

  $scope.data = _.cloneDeep(CUSTOMER);
  $scope.customerList = [];

  angular.forEach(customerContents, function (val, key) {
    Service.method.getAll($scope, val, key);

    $scope[key + 'Ok'] = function () {
      Service.method.add($scope, val, key, $scope.data, function () {
        $scope.data = _.cloneDeep(InitData);
        Service.method.getAll($scope, val, key);
      });
    };

    $scope[key + 'Update'] = function () {
      Service.method.update($scope, val, key, $scope.data, function () {
        $scope.data = _.cloneDeep(InitData);
        Service.method.getAll($scope, val, key);
      })
    };

    $scope[key + 'Del'] = function (data) {
      Service.method.del($scope, val, key, data, function () {
        Service.method.getAll($scope, val, key);
      });
    }
  });
});
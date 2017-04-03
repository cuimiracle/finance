/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'Service', 'PageMap', 'InitData',
  function ($scope, Service, PageMap, InitData) {
    var homeContents = PageMap.home;

    $scope.data = _.cloneDeep(InitData);

    $scope.bannerList = [];
    $scope.introList = [];
    $scope.bigImgList = [];
    $scope.picTextList = [];
    $scope.bottomList = [];

    angular.forEach(homeContents, function (val, key) {
      Service.method.getAll($scope, val, key);

      $scope[key + 'Ok'] = function () {
        Service.method.add($scope, val, key, $scope.data, function () {
          $scope.data = _.cloneDeep(InitData);
          Service.method.getAll($scope, val, key);
        });
      };

      $scope[key + 'Update'] = function (data) {
        Service.method.update($scope, val, key, data, function () {
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
  }]);
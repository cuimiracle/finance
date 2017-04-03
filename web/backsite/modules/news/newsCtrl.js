/**
 * 新闻内容管理
 */
MYSITE.controller('NewsCtrl', ['$scope', 'Service', 'PageMap', 'InitData',
  function ($scope, Service, PageMap, InitData) {
    var newsContents = PageMap.news;

    $scope.data = _.cloneDeep(InitData);

    $scope.companyList = [];
    $scope.newsList = [];
    $scope.industryList = [];

    $scope.edit = function (data) {
      $scope.data = data;
    };

    angular.forEach(newsContents, function (val, key) {
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
  }]);
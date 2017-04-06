/**
 * 技术分析管理
 */
MYSITE.controller('TechCtrl', ['$scope', 'Service', 'PageMap', 'InitTechData',
  function ($scope, Service, PageMap, InitTechData) {
    var techContents = PageMap.tech;

    $scope.data = _.cloneDeep(InitTechData);

    $scope.mainList = [];

    $scope.edit = function (data) {
      $scope.data = data;
    };

    angular.forEach(techContents, function (val, key) {
      Service.method.getAll($scope, val, key);

      $scope[key + 'Ok'] = function () {
        Service.method.add($scope, val, key, $scope.data, function () {
          $scope.data = _.cloneDeep(InitTechData);
          Service.method.getAll($scope, val, key);
        });
      };

      $scope[key + 'Update'] = function () {
        Service.method.update($scope, val, key, $scope.data, function () {
          $scope.data = _.cloneDeep(InitTechData);
          Service.method.getAll($scope, val, key);
        })
      };

      $scope[key + 'Del'] = function (data) {
        Service.method.del($scope, val, key, data, function () {
          Service.method.getAll($scope, val, key);
        });
      }

      $scope.uploader = Service.uploader(function (path) {
        $scope.data.photo = path;
      });
    });
  }]);
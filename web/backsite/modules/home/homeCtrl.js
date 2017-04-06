/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'Service', 'PageMap', 'InitData','FileUploader',
  function ($scope, Service, PageMap, InitData, FileUploader) {
    var homeContents = PageMap.home;

    $scope.data = _.cloneDeep(InitData);

    $scope.bannerList = [];
    $scope.featureList = [];
    $scope.introList = [];
    $scope.subIntroList = [];
    $scope.bigImgList = [];
    $scope.picTextList = [];
    $scope.bottomList = [];

    $scope.edit = function (data) {
      $scope.data = data;
    };

    angular.forEach(homeContents, function (val, key) {
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

    $scope.uploader = Service.uploader(function (path) {
      $scope.data.photo = path;
    });
  }]);
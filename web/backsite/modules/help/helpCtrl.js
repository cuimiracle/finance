/**
 * 帮助和关于内容管理
 */
MYSITE.controller('HelpCtrl', ['$scope', 'Service', 'PageMap', 'InitData',
  function ($scope, Service, PageMap, InitData) {
    var helpContents = PageMap.help;

    $scope.data = _.cloneDeep(InitData);

    $scope.aboutList = [];
    $scope.partnerList = [];
    $scope.helpList = [];

    $scope.edit = function (data) {
      $scope.data = data;
    };

    angular.forEach(helpContents, function (val, key) {
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
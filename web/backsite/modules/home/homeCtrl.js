/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'Service', 'PageMap', 'InitData','FileUploader',
  function ($scope, Service, PageMap, InitData, FileUploader) {
    var homeContents = PageMap.home;

    $scope.data = _.cloneDeep(InitData);

    $scope.bannerList = [];
    $scope.introList = [];
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

    var uploader = $scope.uploader = new FileUploader({
      url: '../index.php?r=upload-file/photos',
      headers: { 'Content-Transfer-Encoding': 'utf-8' }
    });

    uploader.onSuccessItem = function(fileItem, response, status, headers) {
      // console.log('success', fileItem, response);
      $scope.data.photo = response.file_path;
    };
    var imageFilter = {
      name: 'imageFilter',
      fn: function(item /*{File|FileLikeObject}*/, options) {
        var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
        return '|jpg|png|jpeg|gif|'.indexOf(type) !== -1;
      }
    }
    $scope.uploader.filters.push(imageFilter);
  }]);
/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'HomeService', 'FileUploader', 'HomeService',
  function ($scope, HomeService, FileUploader, HomeService) {
    $scope.myHtml = '';

    var options = {
      url: 'upload.php/'
    }
    var uploader = $scope.uploader = new FileUploader(options);
    uploader.onBeforeUploadItem = function(item) {

    };
    uploader.onCompleteItem = function(fileItem, response, status, headers) {
      console.info('onCompleteItem', fileItem, response, status, headers);
    };

    HomeService.getAllBanner().then(function (res) {
      console.log(res);
    });
  }]);
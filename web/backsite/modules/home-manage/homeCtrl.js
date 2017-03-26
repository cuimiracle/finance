/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'HomeService', 'FileUploader',
  function ($scope, HomeService, FileUploader) {
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
  }]);
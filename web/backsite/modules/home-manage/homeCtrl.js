/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'HomeService',
  function ($scope, HomeService) {
    $scope.bannerData = {
      title: '',
      content: '',
      photo: '',
      link_url: ''
    };

    $scope.myHtml = '';

    function getAllBanner() {
      HomeService.getAllBanner().then(function (res) {
        console.log(res);
      });
    }
    getAllBanner();

    $scope.bannerOk = function () {
      HomeService.addBanner($scope.bannerData).then(function (res) {
        if (res.data.insert_id) {
          getAllBanner();
        }
      });
    };
  }]);
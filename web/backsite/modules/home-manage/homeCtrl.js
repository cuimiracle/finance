/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'HomeService',
  function ($scope, HomeService) {
    $scope.bannerList = [];

    $scope.bannerData = {
      title: '',
      content: '',
      photo: '',
      link_url: ''
    };

    $scope.myHtml = '';

    function getAllBanner() {
      HomeService.getAllBanner().then(function (res) {
        $scope.bannerList = res.data.data;
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

    $scope.deleteBanner = function (data) {
      HomeService.deleteBanner(data.id).then(function (res) {
        getAllBanner();
      });
    };
  }]);
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

    HomeService.getAllBanner().then(function (res) {
      console.log(res);
    });

    $scope.bannerOk = function () {
      HomeService.addBanner($scope.bannerData).then(function (res) {
        console.log(res);
      });
    };
  }]);
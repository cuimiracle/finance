/**
 * 主页内容管理
 */
MYSITE.controller('HomeCtrl', ['$scope', 'HomeService',
  function ($scope, HomeService) {
    var initData = {
      title: '',
      content: '',
      photo: '',
      link_url: ''
    };

    $scope.bannerList = [];
    $scope.introList = [];

    $scope.bannerData = _.cloneDeep(initData);
    $scope.introData = _.cloneDeep(initData);

    $scope.myHtml = '';

    function commonGetAll(actionName, listName) {
      HomeService[actionName]().then(function (res) {
        $scope[listName] = res.data.data;
      })
    }

    // function getAllBanner() {
    //   HomeService.getAllBanner().then(function (res) {
    //     $scope.bannerList = res.data.data;
    //   });
    // }
    // function getAllIntro() {
    //   HomeService.getAllIntro().then(function (res) {
    //     $scope.introList = res.data.data;
    //   });
    // }
    commonGetAll('getAllBanner', 'bannerList');
    commonGetAll('getAllIntro', 'introList');

    $scope.bannerOk = function () {
      HomeService.addBanner($scope.bannerData).then(function (res) {
        if (res.data.insert_id) {
          commonGetAll('getAllBanner', 'bannerList');
        }
      });
    };

    $scope.deleteBanner = function (data) {
      HomeService.deleteBanner(data.id).then(function (res) {
        commonGetAll('getAllBanner', 'bannerList');
      });
    };
  }]);
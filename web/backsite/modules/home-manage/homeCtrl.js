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
    delete $scope.introData.link_url;

    $scope.myHtml = '';

    function commonGetAll(actionName, listName) {
      HomeService[actionName]().then(function (res) {
        $scope[listName] = res.data.data;
      })
    }

    function commonAdd(data, actionName, callback) {
      HomeService[actionName](data).then(function (res) {
        if (res.data.insert_id) {
          callback();
        }
      })
    }

    function commonDelete(id, actionName, callback) {
      HomeService[actionName](id).then(function () {
        callback();
      });
    }
    commonGetAll('getAllBanner', 'bannerList');
    commonGetAll('getAllIntro', 'introList');

    $scope.bannerOk = function () {
      commonAdd($scope.bannerData, 'addBanner', function () {
        commonGetAll('getAllBanner', 'bannerList');
      })
    };

    $scope.introOk = function () {
      commonAdd($scope.introData, 'addIntro', function () {
        commonGetAll('getAllIntro', 'introList');
      });
    };

    $scope.deleteBanner = function (data) {
      commonDelete(data.id, 'deleteBanner', function () {
        commonGetAll('getAllBanner', 'bannerList');
      });
    };

    $scope.deleteIntro = function (data) {
      commonDelete(data.id, 'deleteIntro', function () {
        commonGetAll('getAllIntro', 'introList');
      });
    };
  }]);
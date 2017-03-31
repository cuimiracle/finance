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
    $scope.bigImgList = [];
    $scope.picTextList = [];
    $scope.bottomList = [];

    $scope.bannerData = _.cloneDeep(initData);
    $scope.introData = _.cloneDeep(initData);
    $scope.bigImg = _.cloneDeep(initData);
    $scope.picText = _.cloneDeep(initData);
    $scope.bottom = _.cloneDeep(initData);

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
    commonGetAll('getBigImgAll', 'bigImgList');
    commonGetAll('getPicTextAll', 'picTextList');
    commonGetAll('getBottomContentAll', 'bottomList');

    $scope.bannerOk = function () {
      commonAdd($scope.bannerData, 'addBanner', function () {
        commonGetAll('getAllBanner', 'bannerList');
      })
    };

    $scope.deleteBanner = function (data) {
      commonDelete(data.id, 'deleteBanner', function () {
        commonGetAll('getAllBanner', 'bannerList');
      });
    };

    $scope.introOk = function () {
      commonAdd($scope.introData, 'addIntro', function () {
        commonGetAll('getAllIntro', 'introList');
      });
    };

    $scope.deleteIntro = function (data) {
      commonDelete(data.id, 'deleteIntro', function () {
        commonGetAll('getAllIntro', 'introList');
      });
    };

    $scope.bigImgOk = function () {
      commonAdd($scope.bigImg, 'addBigImg', function () {
        commonGetAll('getBigImgAll', 'bigImgList');
      });
    };

    $scope.deleteBigImg = function (data) {
      commonDelete(data.id, 'deleteBigImg', function () {
        commonGetAll('getBigImgAll', 'bigImgList');
      });
    };

    $scope.picTextOk = function () {
      commonAdd($scope.picText, 'addPicText', function () {
        commonGetAll('getPicTextAll', 'picTextList');
      });
    };

    $scope.deletePicText = function (data) {
      commonDelete(data.id, 'deletePicText', function () {
        commonGetAll('getPicTextAll', 'picTextList');
      });
    };

    $scope.bottomOk = function () {
      commonAdd($scope.bottom, 'addBottomContent', function () {
        commonGetAll('getBottomContentAll', 'bottomList');
      });
    };

    $scope.deleteBottom = function (data) {
      commonDelete(data.id, 'deleteBottomContent', function () {
        commonGetAll('getBottomContentAll', 'bottomList');
      });
    };
  }]);
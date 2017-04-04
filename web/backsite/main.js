'use strict';

// 定义主模块和添加依赖模块
var MYSITE = angular.module('mySite', ['ui.router', 'ui.bootstrap', 'froala', 'naif.base64', 'angularFileUpload'])
  .config(function ($httpProvider) {
    $httpProvider.defaults.transformRequest = function (data) {
      if (data === undefined) {
        return data;
      }
      return $.param(data);
    };
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
  })
  .config(['$httpProvider',
    function ($httpProvider) {
      $httpProvider.interceptors.push(['$q',
        function ($q) {
          return {
            // status < 300
            response: function (response) {
              var data = response.data;
              // 统一处理result为false的情况
              if (data.result && data.result == "false") {
                alert('error');
              }
              return response;
            },
            // status >= 400
            responseError: function (rejection) {
              switch (rejection.status) {
                // 401 Unauthorized: jump to login page
                case 401:
                  // location.pathname = ;
                  break;
                // other Error
                default:
                  console.warn('error!', rejection);
              }

              return $q.reject(rejection);
            }
          };
        }
      ]);
    }
  ])
  .run(['$rootScope', '$state', 'Service', function ($rootScope, $state, Service) {
    $rootScope.$state = $state;
    $rootScope.username = '';
    $rootScope.logout = function () {
      Service.logout().then(function (res) {
        if (res.data.result) {
          $rootScope.username = '';
          $state.go('login');
        }
      });
    }
  }]);

// bootstrap application
document.addEventListener('DOMContentLoaded', function () {
  angular.bootstrap(document, ['mySite']);
}, false);

MYSITE.config(['$stateProvider', '$urlRouterProvider',
  function ($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise('/');
    $stateProvider
      .state('login', {
        name: 'login',
        url: '/login',
        templateUrl: './modules/common/login.html',
        controller: 'LoginCtrl'
      })
      .state('homeManage', {
        name: 'homeManage',
        url: '/',
        templateUrl: './modules/home/home.html',
        controller: 'HomeCtrl'
      })
      .state('productManage', {
        name: 'productManage',
        url: '/product',
        templateUrl: './modules/product/product.html',
        controller: 'ProductCtrl'
      })
      .state('helpManage', {
        name: 'helpManage',
        url: '/help',
        templateUrl: './modules/help/help.html',
        controller: 'HelpCtrl'
      })
      .state('collegeManage', {
        name: 'collegeManage',
        url: '/college',
        templateUrl: './modules/college/college.html',
        controller: 'CollegeCtrl'
      })
      .state('newsManage', {
        name: 'newsManage',
        url: '/news',
        templateUrl: './modules/news/news.html',
        controller: 'NewsCtrl'
      })
      .state('techManage', {
        name: 'techManage',
        url: '/tech',
        templateUrl: './modules/tech/tech.html',
        controller: 'TechCtrl'
      })
      .state('softwareManage', {
        name: 'softwareManage',
        url: '/software',
        templateUrl: './modules/software/software.html',
        controller: 'SoftwareCtrl'
      })

  }])
  .value('froalaConfig', {
    language: 'zh_cn',
    toolbarInline: false,
    placeholderText: '请输入编辑内容',
    pasteAllowedStyleProps: ['font-family', 'font-size', 'color'],
    toolbarButtons: ['fullscreen', 'print', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', '|', 'specialCharacters', 'color', 'emoticons', 'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'quote', 'insertHR', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertFile', 'insertTable', 'undo', 'redo', 'clearFormatting', 'selectAll', 'html'],
    fontFamilySelection: true,
    fontSizeSelection: true,
    paragraphFormatSelection: true
  })
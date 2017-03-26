'use strict';

// 定义主模块和添加依赖模块
var MYSITE = angular.module('mySite', ['ui.router', 'ui.bootstrap', 'froala', 'angularFileUpload'])
  .config(function ($httpProvider) {
      $httpProvider.defaults.headers.post['Content-Type'] =  'multipart/form-data';
  })
  .config(['$httpProvider',
      function($httpProvider) {
          $httpProvider.interceptors.push(['$q',
              function($q) {
                  return {
                      // status < 300
                      response: function(response) {
                          var data = response.data;
                          // 统一处理result为false的情况
                          if (data.result && data.result == "false" && data.errormsg) {
                              alert('error');
                          }
                          return response;
                      },
                      // status >= 400
                      responseError: function(rejection) {
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
  .run(['$rootScope', '$state', function($rootScope, $state) {
      $rootScope.$state = $state;
  }]);

// bootstrap application
document.addEventListener('DOMContentLoaded', function () {
    angular.bootstrap(document, ['mySite']);
}, false);

MYSITE.config(['$stateProvider', '$urlRouterProvider',
    function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise('/');
        $stateProvider.state('homeManage', {
            name: 'homeManage',
            url: '/',
            templateUrl: './modules/home-manage/home.html',
            controller: 'HomeCtrl'
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
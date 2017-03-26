MYSITE.service('HomeService', function ($http) {
	var urlPre = '';

	// 获取主页内容数据
	this.getHomeData = function () {
		return $http.get(urlPre + '/home/getData');
	};
});
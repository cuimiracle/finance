MYSITE.service('HomeService', function ($http) {
	var urlPre = '../index.php?r=';

	// 首页banner - 获取所有数据
	this.getAllBanner = function () {
		return $http.get(urlPre + 'site-banner/get_all');
	};

	// 首页banner - 获取所有数据 id
	this.getBanner = function () {
		return $http.get(urlPre + 'site-banner/get');
	};

	// 首页banner - site-banner/insert 插入单条数据（title, content, photo, link_url）
	this.addBanner = function (data) {
		return $http.post(urlPre + 'site-banner/insert', data);
	};

	// 首页banner - site-banner/update 更新指定单条数据（id, title, content, photo, link_url）
	this.updateBanner = function (data) {
		return $http.post(urlPre + 'site-banner/update', data);
	};

	// 首页banner - site-banner/update 删除指定单条数据（id）
	this.deleteBanner = function (data) {
		return $http.post(urlPre + 'site-banner/delete', data);
	};

});
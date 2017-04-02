MYSITE.service('HelpService', function ($http) {
	var urlPre = '../index.php?r=';

	// 首页banner - 获取所有数据
	this.getAllBanner = function () {
		return $http.get(urlPre + 'site-banner/get_all');
	};

	// 首页banner - 获取所有数据 id
	this.getBanner = function (id) {
		return $http.get(urlPre + 'site-banner/get', {
			param: {id: id}
		});
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
	this.deleteBanner = function (id) {
		return $http.post(urlPre + 'site-banner/delete', {id: id});
	};

	// 获取所有公司介绍
	this.getAllIntro = function () {
		return $http.get(urlPre + 'site-ideal-trade/get_all');
	};

	// 获取公司介绍
	this.getBanner = function (id) {
		return $http.get(urlPre + 'site-ideal-trade/get', {
			param: {id: id}
		});
	};

	// 添加公司介绍 （title, content, photo, link_url）
	this.addIntro = function (data) {
		return $http.post(urlPre + 'site-ideal-trade/insert', data);
	};

	// 更新公司介绍（id, title, content, photo, link_url）
	this.updateIntro = function (data) {
		return $http.post(urlPre + 'site-banner/update', data);
	};

	// 删除公司介绍
	this.deleteIntro = function (id) {
		return $http.post(urlPre + 'site-ideal-trade/delete', {id: id});
	};

	// 获取所有大图
	this.getBigImgAll = function () {
		return $http.get(urlPre + 'site-single-pic/get_all');
	};

	// 获取大图
	this.getBigImg = function (id) {
		return $http.get(urlPre + 'site-single-pic/get', {
			param: {id: id}
		});
	};

	// 添加大图 （title, content, photo, link_url）
	this.addBigImg = function (data) {
		return $http.post(urlPre + 'site-single-pic/insert', data);
	};

	// 更新大图（id, title, content, photo, link_url）
	this.updateBigImg = function (data) {
		return $http.post(urlPre + 'site-single-pic/update', data);
	};

	// 删除大图
	this.deleteBigImg = function (id) {
		return $http.post(urlPre + 'site-single-pic/delete', {id: id});
	};

	// 获取图文介绍
	this.getPicTextAll = function () {
		return $http.get(urlPre + 'site-single-bottom-detail/get_all');
	};

	// 获取图文介绍
	this.getPicText = function (id) {
		return $http.get(urlPre + 'site-single-bottom-detail/get', {
			param: {id: id}
		});
	};

	// 添加图文介绍 （title, content, photo, link_url）
	this.addPicText = function (data) {
		return $http.post(urlPre + 'site-single-bottom-detail/insert', data);
	};

	// 更新图文介绍（id, title, content, photo, link_url）
	this.updatePicText = function (data) {
		return $http.post(urlPre + 'site-single-bottom-detail/update', data);
	};

	// 删除图文介绍
	this.deletePicText = function (id) {
		return $http.post(urlPre + 'site-single-bottom-detail/delete', {id: id});
	};

	// 获取底部文字
	this.getBottomContentAll = function () {
		return $http.get(urlPre + 'site-single-bottom-detail/get_all');
	};

	// 获取底部文字
	this.getBottomContent = function (id) {
		return $http.get(urlPre + 'site-single-bottom-detail/get', {
			param: {id: id}
		});
	};

	// 添加底部文字 （title, content, photo, link_url）
	this.addBottomContent = function (data) {
		return $http.post(urlPre + 'site-single-bottom-detail/insert', data);
	};

	// 更新底部文字（id, title, content, photo, link_url）
	this.updateBottomContent = function (data) {
		return $http.post(urlPre + 'site-single-bottom-detail/update', data);
	};

	// 删除底部文字
	this.deleteBottomContent = function (id) {
		return $http.post(urlPre + 'site-single-bottom-detail/delete', {id: id});
	};

});
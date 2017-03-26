(function () {
	$('.help-nav li').on('click', function () {
		$(this).addClass('active').siblings().removeClass('active');
		var i = $('.help-content[title="'+$(this).data('target')+'"]').index();
		$('.help-content').hide().eq(i).fadeIn();
	}).first().trigger('click');
})();
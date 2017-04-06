(function () {
	$('.intro-slider').unslider({
		animate: 'fade',
		autoplay: true,
		nav: false,
		infinite: true,
		speed: 1000,
		arrows: {
			prev: '<a class="unslider-arrow prev"><span class="glyphicon glyphicon-chevron-left"></span></a>',
			next: '<a class="unslider-arrow next"><span class="glyphicon glyphicon-chevron-right"></span></a>'
		}
	});

	// $('.product-nav .nav li').on('click', function (e) {
	// 	e.preventDefault();
	// 	var i = $(this).index();
	// 	$(this).addClass('active').siblings('li').removeClass('active');
	// 	$('.product-content').hide().eq(i).fadeIn();
	// }).eq(0).trigger('click');
})();
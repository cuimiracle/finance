/* ----------------------------- 
Scroll into viewPort Animation
----------------------------- */
//$(function () {
    $('.animated').appear(function() {
        var element = $(this),
            animation = element.data('animation'),
            animationDelay = element.data('animation-delay');
        if ( animationDelay ) {

            setTimeout(function(){
                element.addClass( animation + " visible");
            }, animationDelay);

        } else {
            element.addClass( animation + " visible");
        }
    });


//});

$(function () {
    var mobileNav = $('.mobile-nav .dropdown-menu');
    $('.mobile-nav-btn').on('click', function () {
        mobileNav.toggle();
    });
})
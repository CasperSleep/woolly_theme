(function ($) {
    $(window).on('scroll', function() {
        headerResize();
    });

    $(window).on('resize', function() {
        headerResize();
    });

    function headerResize() {
        if ($(window).width() < 768 - 15)
            return;
        var t = $(window).scrollTop();
        if (t > 50) {
            if( !$('.site-header').hasClass('down') ) {
                $('.site-header').addClass('down');
                $('.site-header').stop().animate({paddingTop: 0, paddingBottom: 33}, 200);
                $('.site-branding').stop().hide(200);
                $('#little-logo').stop().show(200);
                $('#site-header-menu').stop().animate({marginTop: 34});
            }
        } else if (t < 50) {
            if( $('.site-header').hasClass('down') ) {
                $('.site-header').removeClass('down');
                $('.site-header').stop().animate({paddingTop: 50, paddingBottom: 28}, 200);
                $('.site-branding').stop().show(200);
                $('#little-logo').stop().hide(200);
                $('#site-header-menu').stop().animate({marginTop: 47});
            }
        };
    }
    $(function () {
        $('#mobile-menu-icon').on('click', function () {
            $('.site-header-menu').addClass('toggled');
        });
        $('.close-sidebar').on('click', function () {
            $('.site-header-menu').removeClass('toggled');
        });

        $('.popup').click(function(event) {
            var width  = 575,
                height = 400,
                left   = ($(window).width()  - width)  / 2,
                top    = ($(window).height() - height) / 2,
                url    = this.href,
                opts   = 'status=1' +
                    ',width='  + width  +
                    ',height=' + height +
                    ',top='    + top    +
                    ',left='   + left;

            window.open(url, 'twitter', opts);

            return false;
        });
    });
})(jQuery);
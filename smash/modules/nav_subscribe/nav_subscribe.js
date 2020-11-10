jQuery(function($){

    function mobileNav() {
        let outer = $('.subscribe-nav-outer');
        let outerBG = $('#subscribe_nav_bg');
        $('#colophon').after(outer);
        $('#colophon').after(outerBG);

        var triggerOpen = $('.subscribe-nav-trigger-open');
        var triggerClose = $('.subscribe-nav-trigger-close, #subscribe_nav_bg');
        triggerOpen.click(function(){
            $('#subscribe_nav_bg').stop().fadeIn(300, function(){
                $('#subscribe_nav_wrap').addClass('toggled');
                $('.subscribe-nav-outer').stop().animate({
                    right: 0
                }, 300);
                scaleBgImages();
            })
        });
        triggerClose.click(function(){
            $('.subscribe-nav-outer').stop().animate({
                right: '-500px'
            }, 300, function(){
                $('#subscribe_nav_wrap').removeClass('toggled');
                $('#subscribe_nav_bg').fadeOut(300);
            });
        });

        runMenu();
    }

    function scaleBgImages() {
        var bgs = $('*[data-bgratio]');
        bgs.each(function(){
            var _ = $(this);
            var w = _.width();
            var r = _.data('bgratio');
            _.stop().height(w * r);
            $(window).resize(function(){
                setTimeout(function(){
                    w = _.stop().width();
                }, 500);
                setTimeout(function(){
                    _.stop().height(w * r);
                },600);
            });
        });
    }

    function runMenu(){
        let triggers = $('.nav-block-trigger');
        triggers.each(function(){
            let _ = $(this);
            _.click(function(){
                let c = $(this).data('show');
                $('.selected').removeClass('selected');
                $('#'+c).toggleClass('selected');
            })
        })
    }
     
    mobileNav();
});
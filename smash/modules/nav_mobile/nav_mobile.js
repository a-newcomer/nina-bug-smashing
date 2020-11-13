jQuery(function($){

    function mobileNav() {
        let outer = $('.mobile-nav-outer');
        let outerBG = $('#mobile_nav_bg');
        $('#colophon').after(outer);
        $('#colophon').after(outerBG);

        var triggerOpen = $('.mobile-nav-trigger-open');
        var triggerClose = $('.mobile-nav-trigger-close, #mobile_nav_bg');
        triggerOpen.click(function(){
            $('#mobile_nav_bg').stop().fadeIn(500, function(){
                $('#mobile_nav_wrap, .mobile-nav-outer').addClass('toggled');
                $('.mobile-nav-outer, .mobile-nav-outer-inner').stop().animate({
                    left: 0
                }, 350, function(){
                    animateNav('#mobile_menu', false);
                });
                scaleBgImages();
            })
        });
        triggerClose.click(function(){
            animateNav('#mobile_menu', true);
            closeMenu();
            $('.mobile-nav-outer, .mobile-nav-outer-inner').stop().animate({
                left: '-500px'
            }, 350, function(){
                $('#mobile_nav_wrap, .mobile-nav-outer').removeClass('toggled');
                $('#mobile_nav_bg').fadeOut(500);
            });
        });

        handleSubs();
        runMenu();
        runMenuImages();
    }

    function handleSubs() {
        const menu = $('#mobile_menu')
        const subs = menu.find('.menu-item-has-children')
        subs.each(function(){
            let _ = $(this)
            let a = _.find('> a')
            a.before('<div class="menu-drop" />')
            let drop = _.find('> .menu-drop')
            a.appendTo(drop)
            a.after('<svg class="icon menu-drop-trigger"><use xlink:href="#down-angle" /></svg>')
            let trigger = drop.find('.menu-drop-trigger')
            trigger.click(function(){
                _.toggleClass('show')
            })
        })
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

    function closeMenu(){
        $('.image-selected').removeClass('image-selected');
        $('#mobile_menu').addClass('selected');
    }

    function runMenu(){
        let triggers = $('.nav-block-trigger');
        $('.image-selected').removeClass('image-selected');
        triggers.each(function(){
            let _ = $(this);
            _.click(function(){
                if(_.hasClass('nav-back')){
                    $('.image-selected').removeClass('image-selected');
                }
                let c = $(this).data('show');
                $('.selected').removeClass('selected');
                $('#'+c).toggleClass('selected');
                animateNav('.animated', true);
                animateNav('#'+c, false);
            })
        })
    }
    
    function runMenuImages(){
        let ww = $(window).outerWidth();
        let triggers = $('.nav-image-trigger');
        triggers.each(function(){
            let _ = $(this);
            _.click(function(e){
                // if(ww > 600){
                //     e.preventDefault();
                // }
                let c = $(this).data('menu-image');
                $('.image-selected').removeClass('image-selected');
                $('#'+c).toggleClass('image-selected');
            })
        })
    }

    function animateNav(el, hide) {
        var base_duration = 50;
        $(el).each(function(i) {
            $('.animated').removeClass('animated');
            $(this).toggleClass('animated');
            var lis = $(this).find('> li');
            var items = lis.find('> .menu-item');
            var li_count = (items.length) - 1,
                hide_timeout = ((i+1) * base_duration * li_count);
            items.reverse().each(function(ii) {
                var li = $(this),
                    show_timeout = (i * li_count * base_duration) + (ii * base_duration);
                window.setTimeout(function() {
                    li.animate({left:0}, 250)
                }, show_timeout);
                if(hide){
                    window.setTimeout(function() {
                        li.animate({left:'-500px'}, 250)
                    }, hide_timeout);
                }
            });
        });
    }
    
    mobileNav();
});
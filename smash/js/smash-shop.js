jQuery(function($){
    let isMobile = false;

    function handleShopNav(){
        $('.shop-nav-title').click(function(){
            $('.shop-menu-container').fadeToggle();
        })
    }
    
    function handleSubs() {
        handleShopNav();
        const menu = $('#shop_menu')
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

    if (!isMobile && $(window).width() <= 768){	
        // do something here
        isMobile = true;
        handleSubs();
    }

    $(window).resize(function(){
        if (!isMobile && $(window).width() <= 768){	
            // do something here
            isMobile = true;
            handleSubs();
        }	
    });
})
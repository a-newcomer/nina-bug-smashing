jQuery(function($){
    function setupSliders(){
        let sliders = $('.collection-sliders').find('.collection-slider');
        sliders.each(function(){
            let _ = $(this);
            let id = _.data('collection');
            let nav = _.data('slider-nav');
            $('#'+id).on('afterChange', function(slick, currentSlide){
                scaleBgImages();
            });
            if(_.hasClass('slider-for')){
                _.slick({
                    arrows: false,
                    asNavFor: nav,
                });
                _.find('.slide').click(function(){
                    let count = _.data('count');
                    let index = $(this).data('slick-index');
                    if (index + 1 == count) {
                        _.slick('slickGoTo', 0);
                    } else {
                        _.slick('slickGoTo', index+1);
                    }
                    // _.slick('slickNext');
                });
            }
            if(_.hasClass('slider-x')){
                _.slick({
                    arrows: false,
                    asNavFor: nav,
                });
            }
            if(_.hasClass('slider-nav')){
                _.slick({
                    arrows: false,
                    dots: true,
                    asNavFor: nav,
                    focusOnSelect: true,
                    slidesToShow: 1,
                    speed: 1000,
                    cssEase: 'ease'
                });
            }
            // $('#'+id).slick({
            //     dots: true,
            //     arrows: false,
            //     infinite: true,
            //     slidesToShow: 1,
            //     slidesToScroll: 1,
            //     speed: 800,
            // })
            
            
            function setupNextPrev(){
                let wrapper = $('#'+id).closest('.collection-slider-wrapper');
                let slides = wrapper.find('.slide');
                let dots = wrapper.find('.slick-dots');
                
                dots.appendTo(wrapper)
        
                // slides.each(function(){
                //     let ths = $(this);
                //     let index = ths.data('slick-index');
                //     ths.click(function(){
                //         $('#'+id).slick('slickGoTo', index+1);
                //     })
                // });
            }
            
            setTimeout(function(){
                scaleBgImages();
                setupNextPrev();
                // setupSlideLinks();
            }, 500)
        })    
    }
    setupSliders();
});
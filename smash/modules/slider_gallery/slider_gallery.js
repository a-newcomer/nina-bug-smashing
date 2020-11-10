jQuery(function($){
    $('.gallery-slider').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.gallery-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 800,
    })

    function setupNextPrev(){
        let wrapper = $('.gallery-slider-wrapper');
        let slides = $('.gallery-slide');
        let dots = $('.slick-dots');
        
        dots.appendTo(wrapper)

        slides.each(function(){
            let _ = $(this);
            let index = _.data('slick-index');
            _.click(function(){
                $('.gallery-slider').slick('slickGoTo', index);
            })
        });
    }

    setTimeout(function(){
        scaleBgImages();
        setupNextPrev();
        // setupSlideLinks();
    }, 500)
});
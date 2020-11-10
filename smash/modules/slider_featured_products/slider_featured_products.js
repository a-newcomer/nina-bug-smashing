jQuery(function($){
    $('.featured-products-slider').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.featured-products-slider').slick({
        dots: false,
        arrows: true,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#long-arrow-left" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#long-arrow-right" /></svg></div>',
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    })

    setTimeout(function(){
        scaleBgImages();
        // setupSlideLinks();
    }, 500)

    function setupSlideLinks() {
        let slides = $('.hero-slide');

        slides.each(function(){
            $(this).find('.slide-dot').click(function(){
                let num = $(this).data('slidenum');
                $('.featured-products-slider').slick('slickGoTo', num);
            });
        })
    }
});
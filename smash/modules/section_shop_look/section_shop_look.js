jQuery(function($){
    $('.shop-look-products').on('afterChange', function(slick, currentSlide){
        scaleBgImages();
    });
    $('.shop-look-products').slick({
        dots: false,
        arrows: true,
        prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#left-angle" /></svg></div>',
        nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#right-angle" /></svg></div>',
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
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
})
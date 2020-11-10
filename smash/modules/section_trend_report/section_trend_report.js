jQuery(function($){
    var products = $('.trend-post-products');

    products.each(function(){
        $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button class="slick-prev"><span /></button>',
            nextArrow: '<button class="slick-next"><span /></button>',
            dots: false
        });
    });
});
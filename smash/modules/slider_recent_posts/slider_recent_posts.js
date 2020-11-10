jQuery(function($){
    function postsSlider() {
        var posts = $('.recent-posts').slick({
			dots: false,
			arrows: true,
			prevArrow: '<i class="slick-prev slider-prev slider-arrow fa fa-angle-left"></i>',
			nextArrow: '<i class="slick-next slider-next slider-arrow fa fa-angle-right"></i>',
			autoplay: false,
			variableWidth: false,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 600,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
        });
    }

    postsSlider();
});
jQuery(document).ready(function($){
    function featuredPosts() {
        $('.featured-posts-slider').slick({
			dots: false,
			arrows: true,
			prevArrow: '<i class="slick-prev slider-prev slider-arrow fa fa-angle-left"></i>',
			nextArrow: '<i class="slick-next slider-next slider-arrow fa fa-angle-right"></i>',
			autoplay: false,
			variableWidth: false,
			slidesToShow: 3,
			slidesToScroll: 1
		});
    }

    featuredPosts();
});
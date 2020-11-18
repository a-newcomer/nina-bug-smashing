jQuery(function($){
    $(window).scroll(function(e) {
        var distanceScrolled = $(this).scrollTop();
        $('.hero-img-inner').css('-webkit-filter', 'blur('+distanceScrolled/250+'px)');
    });
    
    var fadeTitles = $('#fade_title').waypoint(function(direction) {
        $('.hero-content').fadeToggle(2000);
    });
})
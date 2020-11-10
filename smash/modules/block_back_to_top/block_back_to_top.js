jQuery(document).ready(function($){
    function backToTop() {
        $('#back_to_top').click(function(e) {
            e.preventDefault();
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }

    backToTop();
});
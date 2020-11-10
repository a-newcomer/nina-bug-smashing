jQuery(document).ready(function ($) {

    $('#search-close').click(function(){
        $('#search-modal').fadeOut();
    });

    $('#search-modal-inner .search .fancy-input-inner form button').click(function(e) {
        $('#search-modal').fadeOut();
        e.stopPropagation();
    })

    $('.search-modal-link').click(function(e) {
        e.preventDefault();
        $('#search-modal').fadeIn();
        e.stopPropagation();
    })

    $('.modal').click(function() {
        $('.modal').fadeOut();
    });

    $('.modal-box').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
    
    $('.modal-box input[type="submit"]').click(function(e) {
        e.stopPropagation();
    });
});
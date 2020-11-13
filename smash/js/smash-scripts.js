jQuery.fn.reverse = [].reverse;

function copyToClipboard(){
    /* Get the text field */
    var copyText = document.getElementById("postURL");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
}

function externalLinks(){
    jQuery(document.links).filter(function() { 
        return this.hostname != window.location.hostname; 
    }) .attr('target', '_blank');
}

/*
* If using with slick slider add .lazy-slide class to all elements 
* inside slider that are lazy loaded/resized & do the following before calling 
* the slick slider:
*
    $('.SLIDER').on('afterChange', function(slick, currentSlide){
        lazyLoad('.lazy-slide');
    });
*()
*/
function lazyLoad(selector) {
    jQuery(selector).Lazy({
        // your configuration goes here
        scrollDirection: 'vertical',
        threshold: 100,
        afterLoad: function(element) {
            console.log('done');
            scaleBgImages()
        },
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        }
    });
}

function scaleBgImages() {
    var bgs = jQuery('*[data-bgratio]');
    bgs.each(function(){
        var _ = jQuery(this);
        var w = _.width();
        var r = _.data('bgratio');
        _.stop().height(w * r);
        jQuery(window).resize(function(){
            setTimeout(function(){
                w = _.stop().width();
            }, 500);
            setTimeout(function(){
                _.stop().height(w * r);
            },600);
        });
        _.addClass('resized');
    });
}

function animateScroll() {
    jQuery(document).ready(function(){
        jQuery( "a.scrollLink" ).click(function( event ) {
            event.preventDefault();
            jQuery("html, body").animate({ scrollTop: jQuery(jQuery(this).attr("href")).offset().top - 150 }, 500);
        });
    });
}
jQuery.fn.reverse = [].reverse;

// function setupCursors() {
//     (function() {
//         var follower, init, mouseX, mouseY, positionElement, printout, timer;
      
//         follower = document.getElementById('follower');
      
//         printout = document.getElementById('printout');
      
//         mouseX = (function(_this) {
//           return function(event) {
//             return event.clientX;
//           };
//         })(this);
      
//         mouseY = (function(_this) {
//           return function(event) {
//             return event.clientY;
//           };
//         })(this);
      
//         positionElement = (function(_this) {
//           return function(event) {
//             var mouse;
//             mouse = {
//               x: mouseX(event),
//               y: mouseY(event)
//             };
//             follower.style.top = (mouse.y - 40) + 'px';
//             return follower.style.left = (mouse.x - 10) + 'px';
//           };
//         })(this);
      
//         timer = false;
      
//         window.onmousemove = init = (function(_this) {
//           return function(event) {
//             var _event;
//             _event = event;
//             return timer = setTimeout(function() {
//               return positionElement(_event);
//             }, 1);
//           };
//         })(this);
      
//       }).call(this);
// }

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

//animate philosophy page on scroll - use css transforms and translates to animate anywhre on site using the 2 classes .show-on-scroll and .can-see

console.log('philosophy scrolling script is loaded')
    // Detect request animation frame
    var scroll = window.requestAnimationFrame ||
                // IE Fallback
                function(callback){ window.setTimeout(callback, 1000/60)};
    var elementsToShow = document.querySelectorAll('.show-on-scroll'); 

    function loop() {

        Array.prototype.forEach.call(elementsToShow, function(element){
        if (isElementInViewport(element)) {
            element.classList.add('can-see');
        } else {
            element.classList.remove('can-see');
        }
        });

        scroll(loop);
    }

    // Call the loop for the first time
    loop();

    // Helper function from: http://stackoverflow.com/a/7557433/274826
    function isElementInViewport(el) {
    // special bonus for those using jQuery
    if (typeof jQuery === "function" && el instanceof jQuery) {
        el = el[0];
    }
    var rect = el.getBoundingClientRect();
    return (
        (rect.top <= 0
        && rect.bottom >= 0)
        ||
        (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.top <= (window.innerHeight || document.documentElement.clientHeight))
        ||
        (rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
    );
    }
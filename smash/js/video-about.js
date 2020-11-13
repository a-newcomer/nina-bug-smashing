//on about page video, make short video loop play on hover, stop when mouse leaves
console.log('video script loaded');

jQuery(function($){
    var figure = $(".nm-video-outer").hover( hoverVideo, pauseVideo );
    function hoverVideo(e) {
        $('video', this).prop('muted', true);
        $('video', this).get(0).play(); 
    }
    function pauseVideo(e) {
        $('video', this).get(0).pause(); 
    }
    
})
   
//Make longer vimeo video play on click of short loop

//grab the element I want to modify
let iframe = document.getElementById('iframe-container');
let loop =document.querySelector('#nm-about-video');
let player = new Vimeo.Player(iframe);
//function to make the long video show
function showIFrame() {
    iframe.style.opacity = 1;
    iframe.style.zIndex = 2;
    player.play();
    loop.style.opacity = 0;

}
//the video needs to start on click as well as show.
//hooking the function to a click on the about page - should be on video frame!
document.getElementById('nm-about-video').addEventListener('click', showIFrame);
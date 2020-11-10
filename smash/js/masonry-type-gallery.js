console.log('masonry script loaded.');
//grab the container that Masonry will be inside of in a var
let container = document.querySelector('.msnry-container-inner');
let msnry;
// initialize Masonry - ImagesLoaded has nasty error but seems to be doing its job

    imagesLoaded( container, function() {
        // init Isotope after all images have loaded
        msnry = new Masonry( '.msnry-container-inner',  {
            itemSelector: '.msnry-item-outer',
            columnWidth: '.msnry-item-outer',
            horizontalOrder: true
            });
        });
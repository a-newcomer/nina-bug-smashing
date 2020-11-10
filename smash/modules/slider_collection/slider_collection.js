jQuery(function($){
    function setupSliders(){
        let sliders = $('.collection-slider');
        sliders.each(function(){
            let _ = $(this);
            let id = _.data('collection');
            $('#collection_slider_'+id).on('afterChange', function(slick, currentSlide){
                scaleBgImages();
            });
            $('#collection_slider_'+id).slick({
                dots: true,
                arrows: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 800,
            })
            
            
            function setupNextPrev(){
                let wrapper = $('#collection_slider_'+id).closest('.collection-slider-wrapper');
                let slides = wrapper.find('.collection-slide');
                let dots = wrapper.find('.slick-dots');
                
                dots.appendTo(wrapper)
        
                slides.each(function(){
                    let ths = $(this);
                    let index = ths.data('slick-index');
                    ths.click(function(){
                        $('#collection_slider_'+id).slick('slickGoTo', index);
                    })
                });
            }
            
            setTimeout(function(){
                scaleBgImages();
                setupNextPrev();
                // setupSlideLinks();
            }, 500)
        })    
    }
    setupSliders();
});
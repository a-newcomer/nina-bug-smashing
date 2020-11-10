jQuery(function($){
    function positionLinks(){
        var links = $('.quick-links');
        var linksH = links.height();
        var images = $('.entry-content img');
        var setImg = null;
        var setImgP = null;
        var setImgT = null;
        var setImgH = null;

        images.each(function(index){
            let isFlexImg = $(this).parent().hasClass('flex_row')
            if($(this).height() > linksH && index != 0 && !isFlexImg){
                setImg = $(this);
                setImgP = setImg.position();
                setImgT = setImgP.top;
                setImgH = setImg.height();
                
                return false;
            }
        });

        $('.quick-links').css({top: (setImgH / 2) + setImgT - (linksH / 2)});
    }
    positionLinks();

    $(window).resize(function(){
        positionLinks();
    });
});
jQuery(document).ready(function($){
    // ACCORDION
    function runFAQ(){
        var toggleBlocks = $('.toggle-block');

        if(toggleBlocks){
            toggleBlocks.each(function(){
                $(this).find('.toggle-trigger').click(function(){
                    if($(this).closest('.toggle-block').hasClass('toggled')){
                        $(this).parents('.page-faq-wrapper').find('.toggle-block.toggled').find('.toggle-item').fadeToggle('fast');
                        $(this).parents('.page-faq-wrapper').find('.toggle-block').removeClass('toggled');
                    } else {
                        $(this).parents('.page-faq-wrapper').find('.toggle-block.toggled').find('.toggle-item').fadeToggle('fast');
                        $(this).parents('.page-faq-wrapper').find('.toggle-block').removeClass('toggled');

                        if($(this).parent().hasClass('toggled')){
                            $(this).parent().removeClass('toggled')
                        } else {
                            $(this).parent().addClass('toggled')
                        }
                        $(this).next('.toggle-item').fadeToggle('fast');
                    }
                })
            });
        }
    }
    runFAQ();
});
jQuery(document).ready(function($){
    function contactForms() {
        var btn = $('.form-btn-row .btn');
        var forms = $('.contact-form-wrap');
        var popups = $('.popup-modal');

        if(popups.find(forms)){
            popups.addClass('popup-has-forms');
        }

        btn.click(function(e){
            btn.removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
            var id = $(this).data('form-id');
            $('.contact-form').hide();
            $('#contact-form-'+id).fadeIn();
        });
    }

    contactForms();
});
jQuery(document).ready(function($){
    // CUSTOM POPUPS
	var runPopups = function(){
		var popups = $('.popup-modal');

		popups.each(function(){
            var currentPopup = $(this);
            var id = currentPopup.attr('id');
			var useCookie = currentPopup.data('cookie');
			var expire = currentPopup.data('expire');
			var showAfter = currentPopup.data('show');
			var popupTrigger = currentPopup.data('trigger');

			$('.' + popupTrigger).click(function(e){
				e.preventDefault();

				if($('#mobile-menu-wrap, #mobile-menu-backdrop').hasClass('active')){
					$('#mobile-menu-wrap, #mobile-menu-backdrop').toggleClass('active');
				}
				currentPopup.fadeToggle(200);
			});

			currentPopup.find('#popup-close').click(function(){
				currentPopup.fadeToggle(200);
			});

			if(useCookie && expire && showAfter){
				doCookie(currentPopup, id, expire, showAfter);	
			}
		});

		function doCookie(popup, id, expire, show) {
			var hidePopup = $.cookie(id);

	    function show_subscribe(){
	      if(hidePopup != 'true') {
	        popup.fadeIn();
	      }
	    }

	    setTimeout(show_subscribe, show*1000);
	    $.cookie(id, 'true', { expires: expire, path: '/' });
		}
    }
    
    runPopups();
});
jQuery(document).ready(function($){
    // DROPDOWNS
	var runDropdowns = function(){
		var dropdown = $('.dropdown-banner');
		var prevTrigger = '';
		var prevDropdown = '';
		var prevID = '';
		var dropIDs = [];

		dropdown.each(function(){
			var currentDropdown = $(this);
			var dropdownTrigger = currentDropdown.data('trigger');

			$('.' + dropdownTrigger).mouseenter(function(){
				var thisID = $(this).attr('id');

				dropIDs.push(thisID);

				if(prevTrigger){
					prevID = prevTrigger.attr('id');
				}

				if(prevID !== thisID && prevDropdown !== '') {
					prevDropdown.fadeOut(200);
				}

				prevTrigger = $(this);
				currentDropdown.fadeIn(200);
				prevDropdown = currentDropdown;
			});

			currentDropdown.mouseleave(function(){
				currentDropdown.fadeOut(200);
			});
		});

		$('.menu-item').mouseenter(function(){
			var currentMenuItemID = $(this).attr('id');
			if($.inArray(currentMenuItemID, dropIDs) < 0 && prevDropdown !== ''){
				prevDropdown.fadeOut(200);
			}
		});

		$('#site-navigation-wrap').mouseleave(function(){
			prevDropdown.fadeOut(200);
		});


		$(window).scroll(function(){
			$('.dropdown-banner').fadeOut(200);
		});



		$('#subscribe-wrapper-nav').mouseenter(function(){
			$('#dropdown-banner').fadeToggle(200);
		});

		$('#subscribe-banner').mouseleave(function(){
			$('#dropdown-banner').fadeToggle(200);
		});
    }
    
    runDropdowns();
});
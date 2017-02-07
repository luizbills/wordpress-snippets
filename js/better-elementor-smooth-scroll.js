window.jQuery( function ($) {
	
	if ( window.elementorFrontend && window.elementorFrontend.isEditMode() ) {
		return;
	}
	
	function isMobile () {
		return $('body').width() < 960;
	}
	
	function anchorHandler () {
		var $scrollable = $('html, body'),
			adminBarHeight = $( '#wpadminbar' ).height() || 0,
			$links = $('a[href*=#]');

		$links.off();

		$('a[href*=#]').on('click', function(event) {
			var location = window.location,
				isSamePathname = (location.pathname === this.pathname),
				isSameHostname = (location.hostname === this.hostname),
				offset = isMobile() ? 100 : 150; // CHANGE THIS

			if (!isSameHostname || !isSamePathname) {
				return;
			}

			event.preventDefault();

			var ID = $(this).attr('href').replace('#', ''),
				pos = 0;

			if (ID.length > 0) {
				pos = $('.elementor-menu-anchor[id="' + ID + '"]').first().offset().top - adminBarHeight - offset
			}

			/*
			if ( $(this).parent().parent().hasClass('slideout-menu') ) {
				$('.slideout-overlay').click();
			}
			*/

			$scrollable.animate({
				scrollTop: pos
			}, 1000);
		} );
	}
	
	window.setTimeout(anchorHandler, 500);
	
});

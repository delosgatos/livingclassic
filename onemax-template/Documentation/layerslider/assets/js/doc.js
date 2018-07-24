$(document).ready(function() {

	// Check user OS
	if(navigator.appVersion.indexOf('Mac') != -1) {
		$('body').addClass('mac');
	}

	// Init syntax highlighter
	SyntaxHighlighter.defaults.toolbar = false;
	SyntaxHighlighter.all();

	// Init sidebar
	$('#sidebar li').click(function(e) {

		var $li = $(this);

		// Do nothing if it's the active menu
		if( $li.hasClass('active') ) { return false; }

		// Highlight the menu item
		$li.addClass('active').siblings().removeClass('active');

		// Show new section
		$('#content > div > section').removeClass('active').eq( $li.index() ).addClass('active');

		// Scroll to top
		$('#content').scrollTop(0);

		// Filter out triggered events
		if( ! e.isTrigger ) {

			// Update hash
			document.location.hash = $li.data('hash');
		}
	});


	// JumpTo functionality
	$(window).on('hashchange', function(e) {
		e.preventDefault();

		var hash 		= document.location.hash.substr(1),
			$target 	= $('[data-target="'+hash+'"]'),
			$section 	= $target.closest('section');

		if( $target.length && $section.length ) {

			$('#sidebar li').eq( $section.index() ).trigger('click');

			var scrollTop = $('#content').scrollTop() + $target.offset().top;
				scrollTop = scrollTop < 50 ? 0 : scrollTop;

			$('#content').stop(true, true).animate({ scrollTop: scrollTop }, 500);
		}
	}).trigger('hashchange');

});
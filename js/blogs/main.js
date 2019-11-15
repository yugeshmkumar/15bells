/**
 * Main scripts file
 */
'use strict'
;$(document).ready(function() {

	/** LOADER */
	setTimeout(function(){

		$('.loader-cover').fadeOut();
	}, 2000);

	/** ISOTOPE */
	var portfolio = $('.portfolio');

	if ( portfolio.length > 0 ) {

		var filter_span = $('.filter span');

		portfolio.imagesLoaded(function() {

			portfolio.isotope({ layoutMode: 'masonry' });
		});

		$(document).on('click', '.filter span', function() {

			var filterVal = this.getAttribute('data-filter');

			if ( filterVal === 'all' ) {

				filter_span.removeClass('active');
				this.classList.add('active');

				portfolio.isotope({ filter: '*' });
				return false;
			}

			if ( filterVal !== '' ) {

				filter_span.removeClass('active');
				this.classList.add('active');

				portfolio.isotope({ filter: '.' + filterVal });
			}
		});
	}

	/** CACHE JQUERY OBJECTS */
	var header = $('header'),
	body = $('body'),
	popup = $('.popup');

	/** OPEN POPUP */
	$(document).on('click', '.show-menu', function(e) {

		e.preventDefault();
		header.fadeOut();
		body.addClass('stop-scrolling');
		popup.fadeIn().addClass('animate');
	});

	/** CLOSE POPUP */
	$(document).on('click', '.close-btn', function() {

		popup.hide();
		body.removeClass('stop-scrolling');
		setTimeout(function() {popup.removeClass('animate');}, 500);
		header.fadeIn();
	});

	$(window).on('scroll', function() {

		if ( window.pageYOffset > 0 || window.scrollY > 0 ) {

			header.addClass('sticky');
		} else {

			header.removeClass('sticky');
		}
	});

	/**
	 * listTransitionWithDelay
	 * @param  int start delay sec
	 * @param  int step delay sec
	 * @param  int $list delay list container
	 */
	function listTransitionWithDelay(start, step, $list) {

		$list.find('li').each(function() {

			$(this).css('transition-delay', start + 's' );
			start += step;
		});
	}

	listTransitionWithDelay(0, .2, $('.popup menu') );
});

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}
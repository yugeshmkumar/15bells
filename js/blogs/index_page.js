/**
 * Index page scripts
 */
'use strict';
$(document).ready(function() {

	var portfolio = $('.portfolio');

	$('.append-button').on( 'click', function() {

		var rand = getRandomInt(1, 5);
		var className = '';

		if ( rand == 4 ) {

			className = 'width-2';
		}

		// create new item elements
		var $items = $('<div class="portfolio-item design ' + className + '"><img alt="" src="img/' + rand + '.png"><div class="cover"><p class="title">UI/UX Design</p><p class="descr">WEBSITE</p><a href="#" class="to-portfolio-item"><img alt="" src="svg/arrow.svg"></a></div></div>');
		// append items to grid
		portfolio.append( $items )
		// add and lay out newly appended items
		.isotope( 'appended', $items );
	});

});
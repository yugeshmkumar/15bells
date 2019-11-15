/**
 * Scripts for blog archive
 */
'use strict';
$(document).ready(function() {

	var portfolio = $('.portfolio');

	$('.append-button').on( 'click', function() {

	  	// create new item elements
		var $items = $('<div class="portfolio-item mobile"><div class="img"><label>MOBILE</label><img alt="" src="img/blog-' + getRandomInt(1,5) + '.png"></div><div class="content"><h3>The History Of Design</h3><h4>JANUARY 11, 2017</h4><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p></div></div>');

		// append items to grid
		portfolio.append( $items )

	    // add and lay out newly appended items
	    .isotope( 'appended', $items );
	});

});

  $(window).scroll(function(e) {
    var s1 = $('.s1'),
        s2 = $('.s2'),
        s3 = $('.s3'),
        s4 = $('.s4'),
		menu = $('.navbar-me'),
        diff = s1[0].offsetTop - window.pageYOffset;
        diff2 = s2[0].offsetTop - window.pageYOffset; 
		diff3 = s3[0].offsetTop - window.pageYOffset; 
        diff4 = s4[0].offsetTop - window.pageYOffset; 
    
		if(diff < 60) {
			$(".navbar-me").addClass("white");
			$(".navbar-me").removeClass("blue");
			$(".menu_a").removeClass("safed");
			$(".menu_a").addClass("neela");
			$('.one').hide();
			$('.two').show();
		}
		if(diff2 < 60) {
			$(".navbar-me").addClass("blue");
			$(".navbar-me").removeClass("white");
			$(".menu_a").addClass("safed");
			$(".menu_a").removeClass("neela");
			$('.one').show();
			$('.two').hide();
		}
		if(diff3 < 60) {
			$(".navbar-me").addClass("white");
			$(".navbar-me").removeClass("blue");
			$(".menu_a").removeClass("safed");
			$(".menu_a").addClass("neela");
			$('.one').hide();
			$('.two').show();
		}
		if(diff4 < 60) {
			$(".navbar-me").addClass("blue");
			$(".navbar-me").removeClass("white");
			$(".menu_a").addClass("safed");
			$(".menu_a").removeClass("neela");
			$('.one').show();
			$('.two').hide();
		}
		if(diff > 60) {
			$(".navbar-me").removeClass("white");
			$(".navbar-me").removeClass("blue");
			$(".menu_a").removeClass("safed");
			$(".menu_a").removeClass("neela");
			$('.one').show();
			$('.two').hide();
		}
});
  

	



	  (function() {
	  var delay = false;

	  $(document).on('mousewheel DOMMouseScroll', function(event) {
		event.preventDefault();
		if(delay) return;

		delay = true;
		setTimeout(function(){delay = false},200)

		var wd = event.originalEvent.wheelDelta || -event.originalEvent.detail;

		//var a= document.getElementsByTagName('a');
		var a= document.getElementsByClassName("section");
		if(wd < 0) {
		  for(var i = 0 ; i < a.length ; i++) {
			var t = a[i].getClientRects()[0].top;
			if(t >= 40) break;
		  }
		}
		else {
		  for(var i = a.length-1 ; i >= 0 ; i--) {
			var t = a[i].getClientRects()[0].top;
			if(t < -20) break;
		  }
		}
		
		if(i >= 0 && i < a.length) {
		  $('html,body').animate({
			scrollTop: a[i].offsetTop
		  });
		}
	  });
	})();
	console.clear();
  
  
	$(document).ready(function(){
		$(".start_lets").click(function() {
			$('html, body').animate({
				scrollTop: $(".s1").offset().top
			}, 1000);
		});

		$(".about_tag").click(function() {
			$('html, body').animate({
				scrollTop: $(".s1").offset().top
			}, 1000);
		});
		
		$(".here_for").click(function() {
			$('html, body').animate({
				scrollTop: $(".s2").offset().top
			}, 1000);
		});

		$('.two').hide();
		$('.office_lease').click(function(){
		$(".appnd_txt").empty();
        $(".appnd_txt").append(" <b>Office Space on Lease.</b>");
			$('#myModal').modal('show');
		});
		$('.office_buy').click(function(){
        $(".appnd_txt").empty();
        $(".appnd_txt").append(" <b>Office Space For Buying.</b>");
			$('#myModal').modal('show');
		});
		$('.office_list').click(function(){
			$(".appnd_txt").empty();
        $(".appnd_txt").append(" <b>List your Property for Office Space.</b>");
			$('#myModal').modal('show');
		});
		$('.office_sale').click(function(){
		alert();
			$(".appnd_txt").empty();
			$(".appnd_txt").append(" <b>Office Space for Distress Sale.</b>");
			$('.modal').modal('show');
		});
	$('.office_distress').click(function(){
			$(".appnd_txt").empty();
			$(".appnd_txt").append(" <b>Office Space for Distress Lease</b>");
			$('.modal').modal('show');
		});
		
		
		$(".common_space").hide();
		$(".arrow_box").hide();
		$(".common_small").hide();
		$(".office_div").click(function(){
			$('.office').show();
			
		});
		$(".ret_div").click(function(){
			$('.retail').show();
			//$('#office_det').slideUp('slow');
		});
		$(".ware_div").click(function(){
			$('.warehouse').show();
			$('.retail').hide();
		});
		$(".last_div").click(function(){
			$('.last').show();
		});
		 
		
	});
	$(document).mouseup(function(e) 
{
    var container = $(".common_space");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});
  
	$('#myCarousel').carousel({
  pause: true,
  interval: false
});

// handles the carousel thumbnails
$('[id^=carousel-selector-]').click( function(){
  var id_selector = $(this).attr("id");
  var id = id_selector.substr(id_selector.length -1);
  id = parseInt(id);
  $('#myCarousel').carousel(id);
  $('[id^=carousel-selector-]').removeClass('selected');
  $(this).addClass('selected');
});

$('#myCarousel').bind('slide.bs.carousel', function (e) {
  var slideFrom = $(this).find('.active').index();
  var videoContent = $('.item[data-slide-number='+slideFrom+'] .embed-responsive');
  videoContent.html( videoContent.html() );
});

// when the carousel slides, auto update
$('#myCarousel').on('slid.bs.carousel', function (e) {
  var id = $('.item.active').data('slide-number');
  id = parseInt(id);
  $('[id^=carousel-selector-]').removeClass('selected');
  $('[id=carousel-selector-'+id+']').addClass('selected');
});
 



	
				/* Open when someone clicks on the span element */
		function openNav() {
			document.getElementById("myNav").style.width = "100%";
		}

		/* Close when someone clicks on the "x" symbol inside the overlay */
		function closeNav() {
			document.getElementById("myNav").style.width = "0%";
		}
	
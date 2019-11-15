	<?php

	use yii\helpers\Url;
	use yii\web\View;
	$this->title = 'Lessor';
	?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDEuefpkgZlwt2EdlmUZHBVKZ4qdx6ACXA&libraries=places,geometry"></script>

	<style>

	    #map {
	        height: 100%;
	    }
	    /* Optional: Makes the sample page fill the window. */
	    html, body {
	        margin: 0;
	        padding: 0;
	    }
	    #description {
	        font-family: Roboto;
	        font-size: 15px;
	        font-weight: 300;
	    }

	    #infowindow-content .title {
	        font-weight: bold;
	    }

	    #infowindow-content {
	        display: none;
	    }

	    #map #infowindow-content {
	        display: inline;
	    }

	    .pac-card {
	        margin: 10px 10px 0 0;
	        border-radius: 2px 0 0 2px;
	        box-sizing: border-box;
	        -moz-box-sizing: border-box;
	        outline: none;
	        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
	        background-color: #fff;
	        font-family: Roboto;
	    }

	    #pac-container {
	        padding-bottom: 12px;
	        margin-right: 12px;
	    }

	    .pac-controls {
	        display: inline-block;
	        padding: 5px 11px;
	    }

	    .pac-controls label {
	        font-family: Roboto;
	        font-size: 13px;
	        font-weight: 300;
	    }

	    #pac-input {
	        background-color: #fff;
	        font-family: Roboto;
	        font-size: 15px;
	        font-weight: 300;
	        margin-left: 12px;
	        padding: 0 11px 0 13px;
	        text-overflow: ellipsis;
	        width: 400px;
	        border-radius: 0px;
	        height: 40px;
	        border: 1px solid #2196F3;
	    }

	    #pac-input:focus {
	        border-color: #4d90fe;
	    }

	    #title {
	        color: #fff;
	        background-color: #4d90fe;
	        font-size: 25px;
	        font-weight: 500;
	        padding: 6px 12px;
	    }
	    #target {
	        width: 345px;
	    }
	    .short_list{font-size: 15px;
	                position: relative;
	                bottom: 3px;
	                left: 5px;
	    }
	    .no_serch{
	        margin:0px !important;
	    }
	    .commrcl_tb{

	        padding:0 !important;
	    }
	    .no_pad{
	        padding:0px !important;
	    }
	    #map-canvas {
	        height: 400px;
	        margin: 0px;
	        padding: 0px;
	    }

	    #panel {
	        position: absolute;
	        top: 5px;
	        left: 50%;
	        margin-left: -180px;
	        z-index: 5;
	        background-color: #fff;
	        padding: 5px;
	        border: 1px solid #999;
	    }
	    .pleasehide{
	        display:none;
	    }  

	    .newr{
	        width:30%;
	        margin-bottom: 1px;
	    }
		.slide{
			padding: 0;
			width: 100%;
			box-shadow:none !important;
		}
		#abcd{
			padding:0px !important;
		}
		#slider_lessor .searchback{
			padding:10px 50px 15px 50px!important;
		}
		#faq .part h4{
			padding-left:6px !important;
		}
		
		.city_cntrl{
			color: #555 !important;
			background-color: #fff !important;
			background-image: none !important;
			border: 1px solid #ccc !important;
			width:80%;
			margin:0 auto;
		}
	</style>

		<!--===========Third Section Starts--------->
				<div class="container-fluid" id="abcd">
					
						<section id="slider_lessor">
	  <div class="container bur_cont" style="margin-top:160px;">
	    <div class="row">
					<div class="col-md-12">
						<p class="section_p text-center">No more worries! Get the best property from the verified Lessor. No fake gestures and promises!</p>
						
					</div>
	               <div class="col-md-12">
	                    <div class="col-md-6" style="padding-top:33px;padding-right:33px;">
							<div class="row">
								<div class="searchback animated bounceInLeft">
								  <h2>Add Property</h2><br>
								  <div class="form-group">
									  <select class="form-control input_lct city_cntrl" onchange="getcity(this.value)" id="search">
										<option>Enter Location (City)</option>
										<option value="Gurgaon">Gurgaon</option>
										<option value="Delhi">Delhi</option>
										<option value="Noida">Noida</option>
										<option value="Greater Noida">Greater Noida</option>
										<option value="Faridabad">Faridabad</option>
										<option value="Ghaziabad">Ghaziabad</option>
									  </select>
									</div>
								<!--<input type="text" name="search" class="search animated rotateInDownLeft" id="search" placeholder="Enter Location (City)">-->
								<input type="text" name="search" class="search animated rotateInDownLeft" id="search1" placeholder="Enter Area (locality)">
							   <p> <a class="btn btn-default" href="#" id="saveproperty" role="button">ADD PROPERTY</a></p>
								</div>
							</div>
							<div class="row">
								<div id="numbersearch" style="position:relative;top:6px;"> 
									<section id="S_pro">
										<div class="container-fluid your_serch">
								 			<div class="row" style="margin:0px !important;">
												<div class="col-md-12 proced_further post">
													<div class="col-md-12">
														<p class="text_p"><span class="number_prop" style="border-bottom: 0px;"></span>You have successfully saved your property !!</p>
														
													</div>
													<div class="col-md-12 butn_pad">
															<div class="col-md-8 text-left">
															<p class="text_p">To proceed further click on Register.</p>
															</div>
															<div class="col-md-4 col-xs-12 text-center">
																<a href="<?= Yii::$app->urlManager->createUrl("user/sign-in/signup") ?>" class="butn_serch">
																	REGISTER
																</a>
															</div> 
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
	                    </div>
	                    <div class="col-md-6">

	                      <div class="row">
	                          <div class="col-md-12 no_pad">
	                                    
	                            <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="4000">
	                              
	                            
	                              <div class="carousel-inner">
	                                
	                                <div class="active item">
	                                            <div class="sliderheading animated bounceInRight">
	                                                <p><span class="heading1"> Endless tenants</span> <br>with a single <br>click</p> 
	                                              </div>
	                                </div>
	                                        <div class="item">
	                                            <div class="sliderheading animated bounceInRight">
	                      
	                                                <p><span class="heading2">Economical in terms of time</span></p> 
	                                              </div>
	                                </div>
	                                        
	                                        <div class="item">
	                                            <div class="sliderheading animated bounceInRight">
	                      
	                                            <p><span class="heading3">Get the best brands for your property</span></p> 
	                                          </div>
	                                </div>
	                              </div>
	                            </div>
	                          </div>              
	                        </div> 
							<div class="row text-right link_sec">
								<ul class="slider_sec">
									<li><a href="javascript:void(0)" onclick="openNav1()">How It Works</a></li>
									<!--<li><a href="javascript:void(0)" onclick="openNav2()">FAQ'S</a></li>-->
								</ul>
							</div>	

	<!---- HOW IT WORKS------>
							<div id="myNav" class="overlay_how">

								  <!-- Button to close the overlay navigation -->
								  <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>

								  <!-- Overlay content -->
								  <div class="overlay-content-how">
									<div class="row">
										<div class="col-md-offset-2 col-md-8">
											<div class="col-md-4 text-center">
												<div class="how_work">
												 <p><div class="icon_count">
														1
													</div></p>
												  <p>Tag your property</p>
												  
												</div>
											</div> 
											<div class="col-md-4 text-center">
												<div class="how_work">
												  <p><div class="icon_count">
														2
													</div></p>
												  <p>Search your fav brand</p>
												</div>
											</div>
											<div class="col-md-4 text-center">
												<div class="how_work">
												  <p><div class="icon_count">
														3
													</div></p>
												  <p>Multiple ways to close the deal</p>
												</div>
											</div>
										</div>
									</div>
								  </div>

							</div>
			<!--HOW IT WORKS ENDS----->
			

			<!----- FAQ'S SECTION STARTS---------->
					<div id="myNav1" class="overlay1">

								  <!-- Button to close the overlay navigation -->
								  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>

								  <!-- Overlay content -->
								  <div class="overlay-content1">
									
	<section id="faq">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12 post">
	       <div class="text-center">
	          
			   <?php
		  $arrgetfaqs = common\models\activemode::getpublishedfaqs("landlord");
		  ?>
	          
	        </div>
	      </div>
	      <div class="col-md-12 post" style="margin: 0px 0px 40px 0px;">
	        <div class="col-md-12 col-sm-12">
	        <div class="part">
			 <?php 
		  $temp = 0;
		  foreach($arrgetfaqs as $getfaqs){ $temp++; ?>
	          <div class="col-md-6">
	            <h4><span><?php echo $temp ?></span><img 
	src="<?= Url::to('@web/img')?>/bullet.png">&nbsp;&nbsp;<?php echo $getfaqs->subject ?></h4>
	          <p class="more"><?php echo $getfaqs->content ?></p>
	          </div>
		  <?php } ?>
	          

	          </div>
	          </div>
	          <a href="<?php echo Yii::$app->urlManager->createUrl(['common\faqs']) ?>" target="_blank"><button class="btn btn-default" 
	type="submit">read more....</button></a>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
								  </div>

							</div>
			<!------FAQ'S section ends----->
							
							
	                    </div>
	                    </div>    
	    </div>
	  </div>
	  
	   <!----- FOOTER SECTION STARTS------>
	  
	   <div class="row footer_link" id="footr_nav" style="background:#000;">		
									<div class="col-md-4" style="padding-top:5px;">
									<i class="fa fa-close clode_anim"></i>
										<p class="rights_resrv">© 2017 ALL RIGHTS RESERVED. POWERED BY <a href="#">Stoneray Technologies</a></p>
									</div>	
									<div class="col-md-5">
										<ul class="footer_mnu" style="padding-top:5px;">
													<li><a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
													<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
													<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
													<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
													<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
													<li><a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("aboutus") ?>">About Us</a></li>
													<li style="border-right:none !important;"><a class="sliding-middle-out" onclick="opencon()" style="cursor: pointer">Contact Us</a></li>
										</ul>
									</div>	
									<div class="col-md-3">
										<ul class="social_ic">
													<li><a href="https://www.facebook.com/15bells/" target="_blank"><i class="fa fa-facebook sc_icn"></i></a></li>
													<li><a href="https://twitter.com/15bells" target="_blank"><i class="fa fa-twitter sc_icn"></i></a></li>
													<li><a href="https://plus.google.com/u/0/101985235162687065074" target="_blank"><i class="fa fa-google-plus sc_icn"></i></a></li>
													<li><a href="https://nl.linkedin.com/company/15bells" target="_blank"><i class="fa fa-linkedin sc_icn"></i></a></li>
													<li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube sc_icn"></i></a></li>
										</ul>
									</div>
									
								</div>
								<div class="social_btn text-center">
										<i class="fa fa-angle-left"></i>
								</div>
	  
	  
	</section>

					
				</div>
		<!---==== Section three ends========-->
		
	</div>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	 var globalvar = '';

	    function getcity(val) {
	        $('#search1').val('');
	        globalvar = val;

	    }
	 $(".social_btn").click(function(){
	            $(".footer_link").animate({
	                width: "100%"
	            });
			$(".social_btn").hide();
			$(".footer_link").show();
	        });
	$(".clode_anim").click(function(){
	            $(".footer_link").animate({
	                width: "0%"
	            });
			$(".social_btn").show(1000);
			$(".footer_link").hide();
	        });
	function openNav1() {
	    document.getElementById("myNav").style.width = "100%";
	}

	/* Close when someone clicks on the "x" symbol inside the overlay */
	function closeNav1() {
	    document.getElementById("myNav").style.width = "0%";
	}

	function openNav2() {
	    document.getElementById("myNav1").style.width = "100%";
	}

	/* Close when someone clicks on the "x" symbol inside the overlay */
	function closeNav2() {
	    document.getElementById("myNav1").style.width = "0%";
	}
	</script>
	 
	<script>
	  $(document).ready(function() {
		  $("#abcd").show();
	         $("#numbersearch").hide();
		  ///Video Mute and Unmute Button////
		  $(".footer_link ").hide();
		$(".vol_up").click( function (){

	    $("#bgvid").prop('muted', !$("#bgvid").prop('muted'));
		 $(".vol_control").find('i').toggleClass('fa-volume-off fa-volume-up')
	});  
	$(".skip_v").click( function (){
	    //$("#bgvid").prop('muted', !$("#bgvid").prop('muted'));
		$("video").prop('muted', true);
		 $(".footer_link ").show();
		// alert();
	}); 
	   
	});

	</script>  


	<script>
	$(document).ready(function(){  
	    $('.menu_drop').addClass('fnt_wht');
	    $('.link_clr').addClass('white_clr');
	});
	</script> 
	<script>
	$(document).ready(function(){    
	$(".img_icon").hover(function(){
	    $(this).addClass('animated zoomIn' + $(this).data('action'));
	});
	$(".img_icon").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd",function(){
	    $(this).removeClass('animated zoomIn' + $(this).data('action'));
	});
	});
	</script>

	<script>

		$(document).ready(function () {
	    var menu = $('.menu')
	    var timeout = 0;
	    var hovering = false;
	    menu.hide();

	    $('.mainbutton')
	        .on("mouseenter", function () {
	        hovering = true;
	        // Open the menu
	        $('.menu')
	            .stop(true, true)
	            .slideDown(400);

	        if (timeout > 0) {
	            clearTimeout(timeout);
	        }
	    })
	        .on("mouseleave", function () {
	        resetHover();
	    });

	    $(".menu")
	        .on("mouseenter", function () {
	        // reset flag
	        hovering = true;
	        // reset timeout
	        startTimeout();
	    })
	        .on("mouseleave", function () {
	        // The timeout is needed incase you go back to the main menu
	        resetHover();
	    });

	    function startTimeout() {
	        // This method gives you 1 second to get your mouse to the sub-menu
	        timeout = setTimeout(function () {
	            closeMenu();
	        }, 1000);
	    };

	    function closeMenu() {
	        // Only close if not hovering
	        if (!hovering) {
	            $('.menu').stop(true, true).slideUp(400);
	        }
	    };

	    function resetHover() {
	        // Allow the menu to close if the flag isn't set by another event
	        hovering = false;
	        // Set the timeout
	        startTimeout();
	    };
	});
		
	</script>

	<script type="text/javascript">



	     $(document).ready(function() {
	    // Configure/customize these variables.
	    var showChar = 100;  // How many characters are shown by default
	    var ellipsestext = "...";
	    var moretext = "Show more >>";
	    var lesstext = "Show less <<";


	    $('.more').each(function() {
	        var content = $(this).html();

	        if(content.length > showChar) {

	            var c = content.substr(0, showChar);
	            var h = content.substr(showChar, content.length - showChar);

	            var html = c + '<span class="moreellipses">' + 
	ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + 
	'</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + 
	'</a></span>';

	            $(this).html(html);
	        }

	    });

	    $(".morelink").click(function(){
	        if($(this).hasClass("less")) {
	            $(this).removeClass("less");
	            $(this).html(moretext);
	        } else {
	            $(this).addClass("less");
	            $(this).html(lesstext);
	        }
	        $(this).parent().prev().toggle();
	        $(this).prev().toggle();
	        return false;
	    });
	});
	             $("#saveproperty").click(doSomething);
	             function doSomething() {


	                              var searchval = $('#search').val();
	                              var searchval1 = $('#search1').val();
	                               
	                                 if (searchval != '' && searchval1 != '') {
	                                        
	                                         $.ajax({
												 type: "POST",
	                                             url: '/frontend/web/lessee/saveproperty',
	                                             data: {searchval: searchval,searchval1:searchval1,user:'lessor'},
	                                             success: function (data) {
	                                                 //alert(data);   
	                                                 if (data != 0) {

	                                                     $('#search').val('');
	                                                     $('#search').val('Enter Location (City)');
	                                                     $('#search1').val('');
	                                                     $("#numbersearch").show();
	                                                     toastr.success('Your Property has been Successfully Saved', 'success');
	                                                     //window.location.replace("http://staging.15bells.com/frontend/web/index.php/user/sign-in/signup");
	                                                 } else {
	                                                     $('#' + searchinput).val('');
	                                                     toastr.error('Server Error', 'error');
	                                                 }


	                                             },
	                                         });
	                                         


	                                 } else {

	                                     toastr.error('Something is Missing', 'error');
	                                 }

	                             }

	             var searchBox1 = new google.maps.places.SearchBox(document.getElementById('search1'));
	                                // map.controls[google.maps.ControlPosition.TOP_CENTER].push(document.getElementById('pac-input'));
	                                 google.maps.event.addListener(searchBox1, 'places_changed', function () {
	                                     searchBox.set('map', null);


	                                     var places = searchBox.getPlaces();

	                                     var bounds = new google.maps.LatLngBounds();
	                                     var i, place;
	                                     for (i = 0; place = places[i]; i++) {
	                                         (function (place) {
	                                             var marker = new google.maps.Marker({
	                                                 position: place.geometry.location
	                                             });
	                                             marker.bindTo('map', searchBox, 'map');
	                                             google.maps.event.addListener(marker, 'map_changed', function () {
	                                                 if (!this.getMap()) {
	                                                     this.unbindAll();
	                                                 }
	                                             });
	                                             bounds.extend(place.geometry.location);


	                                         }(place));

	                                     }
	                                     map.fitBounds(bounds);
	                                     searchBox.set('map', map);
	                                     map.setZoom(Math.min(map.getZoom(), 12));

	                                 });


	   </script>

	<script>
	$(document).ready(function(){
		
		$(".skip_v").click(function(){
			$("#lessor_sec").hide();
			$("#abcd").show();
		});
		
	});

	</script>
	<script>

	         
			 var input = document.getElementById('search1');
	        $(input).on('input', function () {


	            var str = input.value;
	            prefix = globalvar + ', ';
	            if (str.indexOf(prefix) == 0) {
	                //console.log(input.value);
	            } else {
	                if (prefix.indexOf(str) >= 0) {
	                    input.value = prefix;
	                } else {
	                    input.value = prefix + str;
	                }
	            }

	        });
	</script>
	</body>

	</html>

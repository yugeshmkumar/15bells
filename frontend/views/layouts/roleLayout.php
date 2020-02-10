<?php

/**
 * @var $this yii\web\View
 */
use frontend\assets\NewDesignAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;


NewDesignAsset::register($this);

?>
<?php $this->beginContent('@frontend/views/layouts/baserole.php'); ?>

<!-- <script src="https://wchat.freshchat.com/js/widget.js"></script> -->
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB.init({
    xfbml            : true,
    version          : 'v5.0'
  });
};

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=install_email
  page_id="251892915527127"
  theme_color="#c4984f">
</div>




		
			<section class="navbar-info nav_bg">

				<nav class="navbar navbar-default navbar-me">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header col-md-4 logo_div">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/w_menu.svg';  ?>" onclick="openNav()" class="scroll_menu" width="25">
							<button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand site-logo one" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo1.png';  ?>" width="80"></a>
							<a class="navbar-brand site-logo two" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="70"></a>
							<div class="form-group locality_grp">
								 <span class="">Call Us anytime</span><br>
								<span class="location_drop"><a href="tel:6209151515" class="list_lnk font_call">+91 6209-15-15-15</a></span>
							
							  </div>
						</div>
						
						<div class="collapse navbar-collapse navbar-right  header-right-menu" id="navbar-primary-collapse">
								<ul class="nav navbar-nav role_nav">
									<li>
										<a class="menu_a animated slideInDown" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>" id="project-menu">Buy</a>
									</li>
									<li>
										<a class="menu_a animated slideInDown" href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>" id="project-menu">Sell</a>
									</li>
									<li>
										<a class="menu_a animated slideInDown" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>" id="project-menu">Lease in</a>
									</li>
									<li>
										<a class="menu_a animated slideInDown" href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>" id="project-menu">Lease out</a>
									</li>

                       <?php if(yii::$app->user->isGuest) { ?>
									<li>
										<a class="menu_a sign_up" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']).'?ifs=menu1' ?>" id="contact-menu">Sign Up</a>
									</li>
									<li>
										<a class="menu_a" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']) ?>" id="project-menu">Sign In</a>
									</li>
				 	 <?php } else { ?> 				
						            <li>
										<a class="menu_a sign_up" href="<?php echo yii::$app->urlManager->createUrl(['site/userdash']) ?>" id="contact-menu">Dashboard</a>
									</li>

					   <?php } ?>


								</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				 </nav>
				 <div class="container-fluid city_section">
							<div class="container">
								<div class="row">
									<img class="close_citydrop" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/close_city.svg';  ?>">
									<div class="col-md-12">
										<input class="form-control select_city" placeholder="Select your City">
									</div>
									<div class="col-md-12 text-center property_area">
										<div class="col-md-1 hidden-xs"></div>
										<div class="col-md-2 col-xs-4">
											<img class="location_pick property_image1" id="Delhi" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/delhi.svg';  ?>">
											<p class="property_name">Delhi</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img class="location_pick property_image1" id="Gurgaon" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/gurugram.svg';  ?>">
											<p class="property_name">Gurgaon</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img class="location_pick property_image1" id="Faridabad" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/faridabad.svg';  ?>">
											<p class="property_name">Faridabad</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img class="location_pick property_image1" id="Noida" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/noida.svg';  ?>">
											<p class="property_name">Noida</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img class="location_pick property_image1" id="Ghaziabad" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/ghaziabad.svg';  ?>">
											<p class="property_name">Ghaziabad</p>
										</div>
										<div class="col-md-1 hidden-xs"></div>
									</div>
								</div>
							</div>
						</div>
			</section>
			
			<div class="loaderContainer">
            <div class="loader"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/loader.gif';  ?>"></div>
        </div>	
		
		<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <div class="col-md-12">
				
			  <ul class="sliding_menu main_menu">
							<li class="trst_act"><a class="menu_link trust_clck" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Search for Sale	</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Search for Lease</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>">Sell your Property</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>">Lease/ Rent your Property</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>">Blogs</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['aboutus']) ?>">About Us</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['coworking']) ?>">Co Working Space</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['contact-us']) ?>">Contact Us</a></li>
							
					</ul>
					
					
				
			 </div>
			 <div class="col-md-12 no_pad" style="position:absolute;bottom:0;width:100%;">
					<div class="col-md-6 no_pad">
					<a class="side_sign brdr_rt" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']).'?ifs=menu1' ?>" id="contact-menu">Sign Up</a>
					</div>
					<div class="col-md-6 no_pad">
					<a class="side_sign" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']) ?>" id="project-menu">Sign In</a>
					</div>
				</div>
			</div>
			<!-- Use any element to open the sidenav -->
			<span onclick="openNav()"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/menu.png';  ?>" class="img_menu hidden-xs hidden-sm"></span>
    
	
	<!--======QUERY FORM==========-->
		
<?php echo $content ?>


<div class="container-fluid footer_banner">
	<div class="container">
	<div class="row">
			<p class="copy_rt">2019 © 15 Bells </p>
			<div class="col-md-2 col-xs-6">
				<h4 class="footer_typ">Resources</h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>" class="list_lnk">Blogs</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['faq']) ?>" class="list_lnk">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-xs-6">
				<h4 class="footer_typ"><a href="<?php echo yii::$app->urlManager->createUrl(['officespaces']) ?>" class="link_main">Office Spaces</a></h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['officespaces/gurugram']) ?>" class="list_lnk">In Gurgaon</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['officespaces/delhi']) ?>" class="list_lnk">In Delhi</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['officespaces/noida']) ?>" class="list_lnk">In Noida</a></li>
					</ul>
			</div>
			<div class="col-md-2 col-xs-6">
				<h4 class="footer_typ">Commercial Office Spaces</h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms']) ?>" class="list_lnk">In Gurgaon</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/privacypolicy']) ?>" class="list_lnk">In Delhi</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/refundcancellation']) ?>" class="list_lnk">In Noida</a></li>
				</ul>
			</div>
			<div class="col-md-2 col-xs-6">
				<h4 class="footer_typ">Privacy</h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms']) ?>" class="list_lnk">Terms and Conditions</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/privacypolicy']) ?>" class="list_lnk">Privacy Policy</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/refundcancellation']) ?>" class="list_lnk">Refund & Cancellation</a></li>
				</ul>
			</div>
			
			<div class="col-md-2 col-xs-6">
				<div class="col-md-12 no_pad">
				<h4 class="footer_typ">Reach Out</h4>
				<ul class="fotter_lst">
					<li class=""><a href="tel:6209151515" class="list_lnk">+91 6209-15-15-15</a></li>
					<li class=""><a href="#" class="list_lnk">info@15bells.com</a></li>
				</ul>
				</div>
			</div>
			<div class="col-md-2 col-xs-6">
				<h4 class="footer_typ">Follow us</h4>
					<p><span><a target="_blank" href="https://www.instagram.com/15bells/"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/instagram-logo.svg';  ?>" class="insta_logo" width="17"></a></span>
					<span><a href="https://www.linkedin.com/company/15bell/" target="_blank"><img class="linkedin_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/linkedin.svg';  ?>" width="17"></a></span><span><a target="_blank" href="https://www.facebook.com/15bell/"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/facebook-logo.svg';  ?>" width="10"></a></span></p>
				<div classs="row">

<span class="call_fixed text-center hidden-lg hidden-md"> <a href="https://api.whatsapp.com/send?phone=916209151515" target="_blank" class="whatsapp_no"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/whatsapp.png';  ?>" class="img_me" width="55"></a>	</span>			

<span class="call_fixed text-center hidden-xs hidden-sm"> <a href="https://web.whatsapp.com/send?phone=916209151515" target="_blank" class="whatsapp_no"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/whatsapp.png';  ?>" class="img_me" width="55"></a>	</span>			
		
	</div>
</div>
					  </div>
					  </div>



       
       <?php $this->endContent(); ?>
	   

	<script>// Check document is loaded

	$(document).ready(function(){
		$('.main_menu li a').click(function(){
    $('.main_menu li a').removeClass("active");
    $(this).addClass("active");
		});
$(".location_pick").click(function(){

  var city = this.id;
$(".location_drop").html(city);
$(".city_section").slideUp("slow");
});
});
$(".property_image1").click(function () {
	$(".property_image1").removeClass("border_yellow1");
	// $(".tab").addClass("active"); // instead of this do the below 
	$(this).addClass("border_yellow1");

});


document.onreadystatechange = function () {
	
		$(".locality_grp").click(function(){
	  $(".city_section").slideDown("slow");
	});
		$(".close_citydrop").click(function(){
	  $(".city_section").slideUp("slow");
	});
    setTimeout(function () {
        if (document.readyState == "complete") {
            document.querySelector(".loaderContainer").className = "loaderContainer removeLoader";
        } else {
            document.querySelector(".loaderContainer").className = "loaderContainer";
        }
    }, 1300)
}
// Check document is loaded (End)

window.onload = function () {
    // for onload animation
    const slideClass = document.querySelectorAll(".slide_lines");

    setTimeout(function () {
        slideClass.forEach(function (slides) {
            slides.classList.add("animation");
        })
    }, 1300)

    setTimeout(function () {
		var element = document.getElementById("banner_cont");
        element.classList.add("banner_ani");
       
    }, 2000)
    // for onload animation (End)

    
    // for header scroll (end)


   
    // onlick hamburger menu open (end)


   
    // onlick hamburger menu close (end)

   
    // onclick open city list modal (End)

   
  
    // onclick go to previous page (End)


    // if ((window.location == "https://rahulalamks.github.io/15bells/checkbox.html") || (window.location == "https://rahulalamks.github.io/15bells/radion.html") || (window.location == "https://rahulalamks.github.io/15bells/form.html")) {
    //     window.onresize = function () {
    //         if (window.outerWidth < 751) {
    //             document.querySelector(".header_menus .black_menus").classList.remove("black_menus");
    //         } else {
    //             document.querySelector(".header_menus .black_menus").classList.add("black_menus");
    //         }
    //     }
    // }

   
}
</script>
 <script>
 
$(window).scroll(function() {
    if($(this).scrollTop()>5) {
        $( ".navbar-me" ).addClass("fixed-me");
		$('.two').show();
			$('.one').hide();
    } else {
        $( ".navbar-me" ).removeClass("fixed-me");
		$('.one').show();
			$('.two').hide();
    }
	if($(this).scrollTop()>200) {
		$('.img_menu').hide(400);
			$('.scroll_menu').show(400);
    } else {
		$('.img_menu').show(400);
			$('.scroll_menu').hide(400);
    }
});
/* Set the width of the side navigation to 250px */
function openNav() {
document.getElementById("mySidenav").style.width = "300px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}
</script>

 



  
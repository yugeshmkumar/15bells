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
<?php $this->beginContent('@frontend/views/layouts/base10.php'); ?>

<!-- <script src="https://wchat.freshchat.com/js/widget.js"></script> -->


		
			<section class="navbar-info nav_bg">

				<nav class="navbar navbar-default navbar-me">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header col-md-4 logo_div">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/w_menu.svg';  ?>" onclick="openNav()" class="scroll_menu" width="25">
							<button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/w_menu.svg';  ?>" onclick="openNav()" class="mobile_mnu" width="25">
							</button>
							<a class="navbar-brand site-logo one" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo1.png';  ?>" width="80"></a>
							<a class="navbar-brand site-logo two" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="70"></a>
							 <div class="form-group locality_grp">
								<span class="location_drop">Select City</span>
								<span><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="23" class="svg_drop">
								</span>
							  </div>
						</div>
						
						<div class="collapse navbar-collapse navbar-right  header-right-menu" id="navbar-primary-collapse">
								<ul class="nav navbar-nav">
									
									<li>
										<a class="menu_a sign_up" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']).'?ifs=menu1' ?>" id="contact-menu">Sign Up</a>
									</li>
									<li>
										<a class="menu_a" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']) ?>" id="project-menu">Sign In</a>
									</li>
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
			<div class="container-fluid dot_div">
				<div class="absolute lines_main_container">
						<div class="lines_container">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container">
							<div class="lines small_border"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container small_hide">
							<span class="internal_line">&nbsp;</span>
							<div class="slide_lines"></div>
							<div class="lines"></div>
						</div>
						<div class="lines_container small_hide">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
						<div class="lines_container small_hide">
							<div class="lines"></div>
							<div class="slide_lines"></div>
						</div>
				</div>
            </div>
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
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>">Insights</a></li>
							<li class="trans_act"><a class="menu_link" href="<?php echo yii::$app->urlManager->createUrl(['faq']) ?>">Industries</a></li>

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
			
			<div class="col-md-4 col-xs-6">
				<h4 class="footer_typ">Privacy</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">Terms and Conditions</a></li>
					<li class=""><a href="#" class="list_lnk">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-4 col-xs-6">
				<div class="col-md-12 no_pad">
				<h4 class="footer_typ">Reach Out</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">+91 6209151515</a></li>
					<li class=""><a href="#" class="list_lnk">info@15bells.com</a></li>
				</ul>
				</div>
			</div>
			<div class="col-md-4 col-xs-6">
			<h4 class="footer_typ">Follow us</h4>
					<p class=""><span><a href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/instagram-logo.svg';  ?>" class="insta_logo" width="17"></a></span>
					<span><a href="#"><img class="linkedin_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/linkedin.svg';  ?>" width="17"></a></span><span><a href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/facebook-logo.svg';  ?>" width="10"></a></span>
				<div classs="row">

				
					<!-- Begin Mailchimp Signup Form -->
<!-- <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
<style>
.form_subscribe{
	text-align:left !important;
}
.email_input{
	float:left;
	width:70%;
}
.sub_buttn{
	border-color: #c4984f !important;
    background: #c4984f;
    color: #ffffff !important;
    border-radius: 0;
    outline: none;
    font-size: 15px;
    padding: 10px 9px;
    margin-top: 7px;
    border: 0;
}
</style>
<div id="mc_embed_signup">
<form action="https://15bells.us3.list-manage.com/subscribe/post?u=ab39867f2e4b25303dc58ccfd&amp;id=d3c5892067" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form_subscribe" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<input type="email" value="" name="EMAIL" id="mce-EMAIL" class="form-control input_desgn email_input" placeholder="email address" required>
     real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <!-- <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ab39867f2e4b25303dc58ccfd_d3c5892067" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="sub_buttn"></div>
    </div>
</form>
</div> -->

<!--End mc_embed_signup-->


<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us3.list-manage.com","uuid":"ab39867f2e4b25303dc58ccfd","lid":"d3c5892067","uniqueMethods":true}) })</script>
				</div>
			</div>
		</div>
	</div>
</div>
     



       
       <?php $this->endContent(); ?>
	   <!-- <script>
  window.fcWidget.init({
    token: "ebc8f91e-d61d-4c7b-a141-153392459204",
    host: "https://wchat.freshchat.com"
  });
</script> -->

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

 



  
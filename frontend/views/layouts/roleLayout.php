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
								<span class="location_drop">Gurgaon</span>
								<span><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/down.svg';  ?>" width="23" class="svg_drop">
								</span>
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
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/delhi.svg';  ?>">
											<p class="property_name">Delhi</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/gurugram.svg';  ?>">
											<p class="property_name">Gurgaon</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/faridabad.svg';  ?>">
											<p class="property_name">Faridabad</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/noida.svg';  ?>">
											<p class="property_name">Noida</p>
										</div>
										<div class="col-md-2 col-xs-4">
											<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/prop/ghaziabad.svg';  ?>">
											<p class="property_name">Gaziabad</p>
										</div>
										<div class="col-md-1 hidden-xs"></div>
									</div>
								</div>
							</div>
						</div>
			</section>
			
			 <div class="loaderContainer">
            <div class="loader">Loading...</div>
        </div>	
		
		<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <div class="col-md-12">
				
					<ul class="sliding_menu">
							<li class="trst_act active"><a class="menu_link trust_clck" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Search for Sale	</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Search for Lease</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>">Sell your Property</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>">Lease/ Rent your Property</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>">Insights</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['faqs']) ?>">Industries</a></li>

							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['contact-us']) ?>">Contact Us</a></li>

					</ul>
					
				
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
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Resources</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">I'm here for</a></li>
					<li class=""><a href="#" class="list_lnk">Blog</a></li>
					<li class=""><a href="#" class="list_lnk">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Contacts</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">Who we are?</a></li>
					<li class=""><a href="#" class="list_lnk">Contact customer service</a></li>
					<li class=""><a href="#" class="list_lnk">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Privacy</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">Terms and Conditions</a></li>
					<li class=""><a href="#" class="list_lnk">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="col-md-12 no_pad">
				<h4 class="footer_typ">Reach Out</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">+91 7042310544</a></li>
					<li class=""><a href="#" class="list_lnk">info@15bells.com</a></li>
				</ul>
				</div>
				<div class="col-md-12 no_pad">
					<h5 class="follow_us">Follow us</h5>
					<p class=""><span><a href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/instagram-logo.svg';  ?>" class="insta_logo" width="17"></a></span>
					<span><a href="#"><img class="linkedin_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/linkedin.svg';  ?>" width="17"></a></span><span><a href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/facebook-logo.svg';  ?>" width="10"></a></span>
				</div>
			</div>
		</div>
	</div>
</div>
     



       
       <?php $this->endContent(); ?>
	   

	<script>// Check document is loaded
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

 



  
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
<?php $this->beginContent('@frontend/views/layouts/base10signup.php'); ?>

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



<body>
   
<div class="container-fluid no_pad div_header">
		
			<section class="navbar-info nav_bg">

				<nav class="navbar navbar-default nav_signup">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header col-md-4">
						<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/w_menu.svg';  ?>" onclick="openNav()" class="dash_menu" width="25">
							<button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/w_menu.svg';  ?>" onclick="openNav()" class="mobile_mnu" width="25">
							</button>
							<a class="navbar-brand site-logo one animated slideInDown" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="60"></a>
							<a class="navbar-brand site-logo two" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="60"></a>
							<div class="form-group locality_grp">
								 <span class="">Call Us anytime</span><br>
								<span class="location_drop"><a href="tel:6209151515" class="list_lnk font_call">+91 6209-15-15-15</a></span>
							
							  </div>
						</div>
					  
						<div class="collapse navbar-collapse navbar-right  header-right-menu" id="navbar-primary-collapse">
								<ul class="nav navbar-nav signup_buttns">
									
									<li>
										<a class="menu_a sign_up animated slideInDown" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']).'?ifs=menu1' ?>" id="contact-menu">Sign Up</a>
									</li>
									<li>
										<a class="menu_a animated slideInDown" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/signup']) ?>" id="project-menu">Sign In</a>
									</li>
								</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				 </nav>
			</section>
			<div id="mySidenav" class="sidenav">
			  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			  <div class="col-md-12">
				
					<ul class="sliding_menu">
							<li class="trst_act active"><a class="menu_link trust_clck" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Search for Sale	</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Search for Lease</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>">Sell your Property</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>">Lease/ Rent your Property</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>">Blogs</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['aboutus']) ?>">About Us</a></li>

							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['contact-us']) ?>">Contact Us</a></li>

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
			
			
<!-- end of navbar-->
		</div>
    
	
	<!--======QUERY FORM==========-->
		
<?php echo $content ?>


   <!--Footer Section------>

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
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms']) ?>" class="list_lnk">In Gurgaon</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/privacypolicy']) ?>" class="list_lnk">In Delhi</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/refundcancellation']) ?>" class="list_lnk">In Noida</a></li>
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
     



       
       <?php $this->endContent(); ?>
<script>
function openNav() {
document.getElementById("mySidenav").style.width = "300px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
}

	</script>
</body>

</html>



  
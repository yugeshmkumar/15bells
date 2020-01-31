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

!-- <script src="https://wchat.freshchat.com/js/widget.js"></script> -->
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
							<button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand site-logo one animated slideInDown" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="65"></a>
							<a class="navbar-brand site-logo two" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="65"></a>
							
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
			
			
			
<!-- end of navbar-->
		</div>
    
	
	<!--======QUERY FORM==========-->
		
<?php echo $content ?>


     <!--Footer Section------>

<div class="container-fluid footer_banner">
	<div class="container">
		<div class="row">
			<p class="copy_rt">2019 © 15 Bells </p>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Resources</h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>" class="list_lnk">Blogs</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['faq']) ?>" class="list_lnk">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Privacy</h4>
				<ul class="fotter_lst">
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms']) ?>" class="list_lnk">Terms and Conditions</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/privacypolicy']) ?>" class="list_lnk">Privacy Policy</a></li>
					<li class=""><a href="<?php echo yii::$app->urlManager->createUrl(['terms/refundcancellation']) ?>" class="list_lnk">Refund & Cancellation</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="col-md-12 no_pad">
				<h4 class="footer_typ">Reach Out</h4>
				<ul class="fotter_lst">
					<li class=""><a href="#" class="list_lnk">+91 6209151515</a></li>
					<li class=""><a href="#" class="list_lnk">info@15bells.com</a></li>
				</ul>
				</div>
			</div>
			<div class="col-md-3">
				<h4 class="footer_typ">Reach Out</h4>
				<ul class="fotter_lst">
					<li class=""><a href="" class="list_lnk">+91 7042310544</a></li>
					<li class=""><a href="" class="list_lnk">info@15bells.com</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>



       
       <?php $this->endContent(); ?>

</body>

</html>


  
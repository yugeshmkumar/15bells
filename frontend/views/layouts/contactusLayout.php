<?php

/**
 * @var $this yii\web\View
 */
use frontend\assets\ContactusAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

ContactusAsset::register($this);
?>
<?php $this->beginContent('@frontend/views/layouts/base10.php'); ?>



<body>
   
<section class="container-fluid header_bg section">
			<div class="top_menu hidden-xs hidden-sm" style="background:#464857;">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="top_div">
								<li class=""><i class="fa fa-phone"></i> 0124-4037100</li>
								<li class=""><i class="fa fa-envelope"></i> 0124-4037100</li>
								<li class=""><i class="fab fa-skype"></i> 0124-4037100</li>
							</ul>
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
				</div>
			</div>
		<div class="container-fluid no_pad">
		
			<section class="navbar-info nav_bg">

				<nav class="navbar navbar-default navbar-me">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand site-logo one" href="<?= Yii::$app->homeUrl ?>"><img class="img_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo1.png';  ?>" width="58"></a>
							<a class="navbar-brand site-logo two" href="<?= Yii::$app->homeUrl ?>"><img class="img_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/logo.png';  ?>" width="50"></a>
						</div>
					  
						<div class="collapse navbar-collapse navbar-right  header-right-menu" id="navbar-primary-collapse">
								<ul class="nav navbar-nav ">
									<li class="page-scroll">
										<a class="header menu_a" href="<?= Yii::$app->homeUrl ?>" id="about-menu">Home</a>
									</li>
									<li>
										<a class="menu_a abut_us" href="<?= Yii::$app->homeUrl ?>/#aboutus" id="services-menu">About Us</a>
									</li>
									<li>
										<a class="menu_a here_for" href="<?= Yii::$app->homeUrl ?>/#herefor" id="Clients-menu">I am here for</a>
									</li>
									<li class="dropdown">
										  <a href="#" class="dropdown-toggle menu_a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
										   <ul class="dropdown-menu">
								 			<li><a class="srv_submnu" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Buying</a></li>
											<li><a class="srv_submnu" href="<?php echo yii::$app->urlManager->createUrl(['seller']) ?>">Selling</a></li>
											<li><a class="srv_submnu" href="<?php echo yii::$app->urlManager->createUrl(['lessee']) ?>">Leasing In</a></li>
											<li><a class="srv_submnu" href="<?php echo yii::$app->urlManager->createUrl(['lessor']) ?>">Leasing Out</a></li>
										  </ul>
										</li>
									<!-- <li>
										<a class="menu_a" href="/#clients" id="contact-menu">Clients</a>
									</li> 
									<li>
										<a class="menu_a" href="javascript:" id="contact-menu">Properties</a>
									</li>-->
									<li>
										<a class="menu_a" target="_blank" href="https://blog.15bells.com/" id="contact-menu">Blog</a>
									</li>
									<li>
										<a class="menu_a" href="<?php echo yii::$app->urlManager->createUrl(['contact-us']) ?>" id="contact-menu">Contact Us</a>
									</li>
									<li>
										<a class="menu_a login_r" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/login']) ?>" id="project-menu">login / register</a>
									</li>
								</ul>
						</div><!-- /.navbar-collapse -->
					</div>
				 </nav>
			</section>
    
	
	<!--======QUERY FORM==========-->
		
<?php echo $content ?>


     
<div class="container-fluid bootm_line">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-left">
					<p class="rights_rervd">Stoneray Technologies Private Limited | All Rights Reserved</p>
				</div>
				<div class="col-md-6 text-right">
					<ul class="footer_mnu">
						<li class=""><a href="<?= Yii::getAlias('@frontendUrl').'/terms_condtion.pdf';  ?>" target="_blank" class="footr_link">Terms & Conditions</a>|</li>
						<li class=""><a href="<?= Yii::getAlias('@frontendUrl').'/privacy_policy.pdf';  ?>" target="_blank" class="footr_link">Privacy Policy</a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>


       
       <?php $this->endContent(); ?>

</body>

</html>



<script>
 $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script> 


  
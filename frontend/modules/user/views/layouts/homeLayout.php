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
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['blogs']) ?>">Insights</a></li>
							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['faq']) ?>">Industries</a></li>

							<li class="trans_act"><a class="menu_link trans_clck" href="<?php echo yii::$app->urlManager->createUrl(['contact-us']) ?>">Contact Us</a></li>

					</ul>
					
				
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
					<li class=""><a href="#" class="list_lnk">+91 7042310544</a></li>
					<li class=""><a href="#" class="list_lnk">info@15bells.com</a></li>
				</ul>
				</div>
			</div>
			<div class="col-md-4 col-xs-6">
			<h4 class="footer_typ">Follow us</h4>
					<p class=""><span><a href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/instagram-logo.svg';  ?>" class="insta_logo" width="17"></a></span>
					<span><a href="#"><img class="linkedin_logo" src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/linkedin.svg';  ?>" width="17"></a></span><span><a href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/facebook-logo.svg';  ?>" width="10"></a></span>
				</div>
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



  
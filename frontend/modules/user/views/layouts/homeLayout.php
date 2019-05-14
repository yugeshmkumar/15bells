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
							<button type="button" class="navbar-toggle collapsed menu-collapsed-button" data-toggle="collapse" data-target="#navbar-primary-collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand site-logo one animated slideInDown" href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="65"></a>
							<a class="navbar-brand site-logo two" href="#"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/logo_y.png';  ?>" width="65"></a>
							
						</div>
					  
						<div class="collapse navbar-collapse navbar-right  header-right-menu" id="navbar-primary-collapse">
								<ul class="nav navbar-nav signup_buttns">
									
									<li>
										<a class="menu_a sign_up animated slideInDown" href="javascript:" id="contact-menu">Sign Up</a>
									</li>
									<li>
										<a class="menu_a animated slideInDown" href="javascript:" id="project-menu">Sign In</a>
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
					<li class=""><a href="" class="list_lnk">I'm here for</a></li>
					<li class=""><a href="" class="list_lnk">Blog</a></li>
					<li class=""><a href="" class="list_lnk">FAQ's</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Contacts</h4>
				<ul class="fotter_lst">
					<li class=""><a href="" class="list_lnk">Who we are?</a></li>
					<li class=""><a href="" class="list_lnk">Contact customer service</a></li>
					<li class=""><a href="" class="list_lnk">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<h4 class="footer_typ">Privacy</h4>
				<ul class="fotter_lst">
					<li class=""><a href="" class="list_lnk">Terms and Conditions</a></li>
					<li class=""><a href="" class="list_lnk">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
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



  
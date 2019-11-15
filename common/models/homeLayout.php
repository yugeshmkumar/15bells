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


    <body>
<style>
.white_clr{
	color:#ffffff !important;
	border-right:1px solid #ffffff !important;
}
.fnt_wht{
	color:#ffffff !important;
}
.overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-x: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}


.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    z-index: 9;
}

</style>
        
 <div class="container-fluid no_pad">
	
	<div class="fixed_top hidden-xs hidden-sm">
		<div class="row">
			<div class="logo_div">
				<span><img class="img_logo" src="<?= Yii::$app->request->baseUrl . '/frontimg/logo.png' ?>" width="90" style="margin:0 auto;"></span><br>
				<span class="menu_m menu_drop mainbutton" id="">MENU</span>
			</div>
		</div>
		<div class="row menu_row menu">		
				<ul class="dropdown_menu">
    						<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
    						<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("blogs") ?>">Blog</a></li>
               <?php if(yii::$app->user->isGuest) { ?>
              <li><a class="sliding-middle-out link_clr" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/login']) ?>">Register/Login</a></li>
			  <?php } else { ?> 
			  						 <?php $arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
	                             foreach($arrcheckrole as $checkrole){
			$findallrouting = \common\models\Bellsroutings::find()->where(['isactive'=>1,'rolename'=>$checkrole->item_name])->one();
			if($findallrouting){ ?>
				<?php if($findallrouting->login_to == "backend"){ ?>
				 <li><a class="sliding-middle-out link_clr" href="<?php echo Yii::getAlias('@backendUrl') ?><?php echo $findallrouting->login_url ?>"> MY DASHBOARD</a></li>
			  
				   <li> <?php echo Html::a(Yii::t('frontend', 'Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post','class'=>"sliding-middle-out link_clr"]) ?></li>

		   	      <?php } else{ ?>
				  <li><a class="sliding-middle-out link_clr" href="<?php echo Yii::$app->urlManager->createUrl($findallrouting->login_url); ?>"> MY DASHBOARD</a></li>
			    <li> <?php echo Html::a(Yii::t('frontend', 'Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post','class'=>"sliding-middle-out link_clr"]) ?></li>

			<?php } } } ?>
			  <?php } ?>
						   <li><a class="sliding-middle-out link_clr" onclick="opencon()" style="border-right:none !important; cursor: pointer;">Contact Us</a></li>
				</ul>	
	</div>
	<!--<div id="mycontact" class="overlay">
		  <a href="javascript:void(0)" class="closebtn" onclick="closecon()">&times;</a>
		  <div class="overlay-content">
		    <a href="#">About</a>
		    <a href="#">Services</a>
		    <a href="#">Clients</a>
		    <a href="#">Contact</a>
		  </div>
		</div>-->
		
	</div>
	<section id="mycontact" class="overlay">
				  <div class="container">
				    <div class="row">
				     <a href="javascript:void(0)" class="closebtn" onclick="closecon()">&times;</a>
				      <div class="overlay-content">
				      	<div class="col-md-12" style="padding: 40px 0px;">
				        <div class="text-center post">
				            <h2>GET IN TOUCH WITH US</h2>
				            <p>Want to know more? Call us, mail us or drop by for a meeting.</p>
				            <p>We promise to provide detailed and quick responses to all your queries.</p>
				        </div>
				      </div>
<style>
.form-control {
   color: #fff;
   background-color: rgba(255, 255, 255, 0.22);
   border: 1px solid #646695;
}
</style>
				<div class="col-sm-12">
				                      <div class="col-sm-6 post">
				            <div id="message_div" ></div>
				             <div class="thumbnail">
							 <?php $model = new \common\models\ContactUs(); ?>
							  <?php $form = ActiveForm::begin(['id'=>"footer-form"]); ?>
                  
				    
				              <form class="form-horizontal" method="post" id="footer-form">
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
													   <?php echo $form->field($model, 'full_name')->textInput(['maxlength' => true,'class'=>"form-control",'placeholder'=>"First & Last Name",'required'=>true])->label(false); ?>
                                  
				                                      </div>
				                                    </div>
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
													   <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>"form-control",'placeholder'=>"example@domain.com",'required'=>true,'type'=>'email'])->label(false); ?>
				                                      </div>
				                                    </div>
													<div class="form-group">
				                                      <div class="col-sm-10">
													   <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true,'class'=>"form-control",'placeholder'=>"8789876789",'required'=>true,'type'=>'number'])->label(false); ?>
				                                      </div>
				                                    </div>
				                                     
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
													  <?= $form->field($model, 'message')->textarea(['rows' => 5,'class'=>"form-control",'placeholder'=>"Message",'required'=>true])->label(false); ?>
				                                      </div>
				                                    </div>
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
				                                        <div class="g-recaptcha" data-sitekey="6LfUOiUUAAAAAA9U0yC5Sf3GEYAGVMXdPmyy17H-"></div>
				                                      </div>
				                                    </div>

				                                   
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
				                                        <input id="submit" name="submit" type="submit"  onClick="get_value();"  value="SEND MESSAGE" class="btn btn-primary">
				                                         <input id="submit1" name="submit" type="Reset" value="RESET" class="btn btn-primary">
				                                      </div>
				                                    </div>
				                                    
				                       </form>
									     <?php ActiveForm::end(); ?>
				                       </div>
				                        </div>
				                      
				                      <div class="col-sm-6 post">
				                        <div class="caption">
				                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.988964630792!2d77.08458631467624!3d28.479878982478237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19243dbca3a1%3A0x18296625c08803fa!2s15bells.com!5e0!3m2!1sen!2sin!4v1497259620721" width="100%" height="380px" frameborder="0" style="border:0" allowfullscreen></iframe>
				                              <div class="caption__overlay">
				                                  <p class="caption__overlay__content">Address :- 130 DLF City Court, Sikanderpur, MG Road, Gurugram - 122002</p>
				                                  <h1 class="caption__overlay__title">
				                                  <i class="fa fa-phone" aria-hidden="true" style=" position: absolute;top: 67px;left: 80px; color:#2f78b4;font-size: 40px;width: 25px;"></i>+011-40536526,<br><a style="color: #fff;" href="mailto:15bells.official@gmail.com">15bells.official@gmail.com</a></h1>
				                              </div>
				                  
				                
				                        </div>
				                      </div>
				                    </div>
				      </div>

				    </div>
				  </div>

				</section>
		<div class="row hidden-lg hidden-md">
		 <div id="nav-container" class="nav_bars col-xs-4 col-sm-4 text-center" style="padding-top:15px;">
		  <i class="fa fa-bars fa-2x" onclick="openNav()"></i>
         </div>
		 <div class="col-sm-4 col-xs-4 text-center">
			<img class="img_logo" src="<?= Yii::$app->request->baseUrl . '/frontimg/logo.png' ?>" width="90" style="margin:0 auto;">
		 </div>
		 <div class="col-sm-4 hidden-xs">
		 </div>
		 <div id="mySidenav1" class="sidenav1">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close close_sml"></i></a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer/buyer") ?>">Buyer</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("blogs") ?>">Blog</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("user/sign-in/login") ?>">Register/Login</a>
		   <a class="sliding-middle-out" onclick="opencon()" style="cursor: pointer;">Contact Us</a>
		</div>
		

	</div>
	 <?php echo $content ?>
	
	<!--==========First Section=========-->
	 </body>
</html>

<?php $this->endBody() ?> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script>
function opencon() {
    document.getElementById("mycontact").style.width = "100%";
}

function closecon() {
    document.getElementById("mycontact").style.width = "0%";
}
</script>
<script>
	  function openNav() {
    document.getElementById("mySidenav1").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav1").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
	  </script>
<script>
$(document).ready(function(){  
$(".menu_clr").click( function (){
    $('.menu_drop').addClass('fnt_wht');
    $('.link_clr').addClass('white_clr');
});  
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



<script>
$(document).ready(function(){
	$(".img_logo").click(function(){
		$("#first_sec").show(2000);
		$("#secnd_sec").hide(2000);
		$("#abcd").hide(2000);
		$("#section_e").hide(2000);
	});
	$(".anchr_ex").click(function(){
		$("#first_sec").hide(2000);
		$("#section_e").hide(2000);
		$("#secnd_sec").show(2000);
	});
	$(".skip_v").click(function(){
		$("#first_sec").hide(2000);
		$("#abcd").show(2000);
		$("#secnd_sec").hide(2000);
		$("#section_e").hide(2000);
	});
	//$(".finish_custm").click(function(){
		//$("#first_sec").hide(2000);
		//$("#abcd").hide(2000);
		//$("#section_e").show();
		//$("#secnd_sec").hide(2000);
	//});
	
});

</script>


<?php $this->endContent(); ?>

		
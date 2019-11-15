<?php

//use yii;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\modules\user\models\SignupForm;
use frontend\modules\user\models\LoginForm;
use frontend\modules\user\models\PasswordResetRequestForm;
use frontend\modules\user\models\ResetPasswordForm;

use frontend\modules\user\views\login;
\frontend\assets\BlogsAsset::register($this);
$this->title = Yii::$app->name;
$model = new SignupForm();
$login = new LoginForm();  
?>

		<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>quiz</title>
    <link href="<?= Url::to('@web/') ?>cssblogs/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= Url::to('@web/') ?>cssblogs/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link href="<?= Url::to('@web/') ?>cssblogs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  </head>
   <body>
   <header>
     <nav class="navbar navbar-inverse navbar-fixed-top first_navbar_blog hidden-xs hidden-sm" style="z-index:1;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 col-md-offset-6">
              <ul class="nav navbar-nav navbar-right">
                  <li><p>Email: <a href="mailto:info@15bells.com">INFO@15BELLS.COM</a></p></li>
                  <li><p>Phone: <a href="tel:999999999">+91-0000 000 00</a></p></li>             
              </ul>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </nav>
      <nav class="navbar navbar-default navbar-fixed-top second_navbar_blog" style="z-index:1;">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
              <img src="<?= Url::to('@web/') ?>/jsblogs/img/logo.png" alt="..." title="....">
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse mobile_view_blog" id="bs-example-navbar-collapse-1">
           
            <ul class="nav navbar-nav navbar-right">
              <li><a class="sliding-middle-out" href="<?php echo yii::getAlias('@frontendUrl') ?>">Home</a></li>
              <li><a class="sliding-middle-out" href="<?php echo yii::$app->urlManager->createUrl(['buyer']) ?>">Buyer</a></li>
              <li><a class="sliding-middle-out" href="<?php echo yii::$app->urlManager->createUrl(['seller/seller']) ?>">Seller</a></li>
              <li><a class="sliding-middle-out" href="<?php echo yii::$app->urlManager->createUrl(['lessor/lessor']) ?>">Lessor</a></li>
              <li><a class="sliding-middle-out" href="<?php echo yii::$app->urlManager->createUrl(['lessee/lessee']) ?>">Lessee</a></li>
              <li><a class="sliding-middle-out" href="#">Blog</a></li>
			  <?php if(yii::$app->user->isGuest) { ?>
              <li><a class="sliding-middle-out" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/login']) ?>">Register/Login</a></li>
			  <?php } else { ?> 
			  						 <?php $arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
	                             foreach($arrcheckrole as $checkrole){
			$findallrouting = \common\models\Bellsroutings::find()->where(['isactive'=>1,'rolename'=>$checkrole->item_name])->one();
			if($findallrouting){ ?>
				<?php if($findallrouting->login_to == "backend"){ ?>
				 <li><a class="sliding-middle-out" href="<?php echo Yii::getAlias('@backendUrl') ?><?php echo $findallrouting->login_url ?>"> MY DASHBOARD</a></li>
			  
				   <li> <?php echo Html::a(Yii::t('frontend', 'Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post','class'=>"sliding-middle-out"]) ?></li>

		   	      <?php } else{ ?>
				  <li><a class="sliding-middle-out" href="<?php echo Yii::$app->urlManager->createUrl($findallrouting->login_url); ?>"> MY DASHBOARD</a></li>
			    <li> <?php echo Html::a(Yii::t('frontend', 'Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post','class'=>"sliding-middle-out"]) ?></li>

			<?php } } } ?>
			  <?php } ?>
              <li><a class="sliding-middle-out" onclick="opencon()">Contact Us</a></li>
             
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
   </header>
   
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
				<div class="col-sm-12">
				                      <div class="col-sm-6 post">
				            <div id="message_div" ></div>
				             <div class="thumbnail">
							 <?php $model = new \common\models\ContactUs(); ?>
							  <?php $form = ActiveForm::begin(['id'=>"footer-form"]); ?>
                  
				    
				              <form class="form-horizontal" method="post" id="footer-form">
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
													   <?php echo $form->field($model, 'full_name')->textInput(['maxlength' => true,'class'=>"form-control",'placeholder'=>"First & Last Name",'required'=>true ,'id'=>'fullname'])->label(false); ?>
                                  
				                                      </div>
				                                    </div>
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
													   <?= $form->field($model, 'email')->textInput(['maxlength' => true,'class'=>"form-control",'placeholder'=>"example@domain.com",'required'=>true,'type'=>'email','id'=>'email'])->label(false); ?>
				                                      </div>
				                                    </div>
													<div class="form-group">
				                                      <div class="col-sm-10">
													   <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true,'class'=>"form-control",'placeholder'=>"8789876789",'required'=>true,'type'=>'number','id'=>'number'])->label(false); ?>
				                                      </div>
				                                    </div>
				                                     
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
													  <?= $form->field($model, 'message')->textarea(['rows' => 5,'class'=>"form-control",'placeholder'=>"Message",'required'=>true,'id'=>'message'])->label(false); ?>
				                                      </div>
				                                    </div>
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
				                                        <div class="g-recaptcha" data-sitekey="6LfUOiUUAAAAAA9U0yC5Sf3GEYAGVMXdPmyy17H-"></div>
				                                      </div>
				                                    </div>

				                                   
				                                    <div class="form-group">
				                                      <div class="col-sm-10">
				                                        <input id="submit" name="submit" type="button"  onClick="get_value();"  value="SEND MESSAGE" class="btn btn-primary">
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
				                                  <i class="fa fa-phone" aria-hidden="true" style=" position: absolute;top: 67px;left: 80px; color:#2f78b4;font-size: 40px;width: 25px;"></i>+012-44037100,<br><a style="color: #fff;" href="mailto:15bells.official@gmail.com">info@15bells.com</a></h1>
				                              </div>
				                  
				                
				                        </div>
				                      </div>
				                    </div>
				      </div>

				    </div>
				  </div>

				</section>
   
   
   <section class="banner">
      <img src="<?= Url::to('@web/') ?>/jsblogs/img/banner.jpg" alt="..." title="..." class="img-responsive">
    </section>
	
		<!--======QUERY FORM==========-->
	
		<!-- Sliding div starts here -->
		<div id="slider" style="right:-342px;">
			<div id="sidebar" onclick="open_panel()"><span class="rotate">WE'RE HERE TO HELP</span></div>
				<div id="header">
					<h2>Contact Form</h2>
					<p>This is my form.Please fill it out.It's awesome!</p>
					<input name="dname" type="text" value="Your Name">
					<input name="demail" type="text" value="Your Email">
					<h4>Query type</h4>
					<select>
					<option>General Query</option>
					<option>Presales</option>
					<option>Technical</option>
					<option>Others</option>
					</select>
					<textarea>Message</textarea>
					<button>Send Message</button>
				</div>
		</div>
	
	
	<!--======QUERY FORM==========-->
	
	
        <?php echo $content ?>
      
       
   
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= Url::to('@web/') ?>jsblogs/js/bootstrap.min.js"></script>
	

<!-----=======Query Form JS=======-->

		<script>
/*
------------------------------------------------------------
Function to activate form button to open the slider.
------------------------------------------------------------
*/
function open_panel() {
slideIt();
var a = document.getElementById("sidebar");
a.setAttribute("id", "sidebar1");
a.setAttribute("onclick", "close_panel()");
}
/*
------------------------------------------------------------
Function to slide the sidebar form (open form)
------------------------------------------------------------
*/
function slideIt() {
var slidingDiv = document.getElementById("slider");
var stopPosition = 0;
if (parseInt(slidingDiv.style.right) < stopPosition) {
slidingDiv.style.right = parseInt(slidingDiv.style.right) + 2 + "px";
setTimeout(slideIt, 1);
}
}
/*
------------------------------------------------------------
Function to activate form button to close the slider.
------------------------------------------------------------
*/
function close_panel() {
slideIn();
a = document.getElementById("sidebar1");
a.setAttribute("id", "sidebar");
a.setAttribute("onclick", "open_panel()");
}
/*
------------------------------------------------------------
Function to slide the sidebar form (slide in form)
------------------------------------------------------------
*/
function slideIn() {
var slidingDiv = document.getElementById("slider");
var stopPosition = -342;
if (parseInt(slidingDiv.style.right) > stopPosition) {
slidingDiv.style.right = parseInt(slidingDiv.style.right) - 2 + "px";
setTimeout(slideIn, 1);
}
}
</script>

<!--========Query Form JS Ends======-->



	
	
	
<script>
function opencon() {
    document.getElementById("mycontact").style.width = "100%";
}

function closecon() {
    document.getElementById("mycontact").style.width = "0%";
}
</script>
    <script type="text/javascript">
      $(document).ready(function() {
                                // Configure/customize these variables.
                                var showChar = 400;  // How many characters are shown by default
                                var ellipsestext = "...";
                                var moretext = "READ MORE ";
                                var lesstext = "READ LESS";
                                

                                $('.more').each(function() {
                                    var content = $(this).html();
                             
                                    if(content.length > showChar) {
                             
                                        var c = content.substr(0, showChar);
                                        var h = content.substr(showChar, content.length - showChar);
                             
                                        var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                             
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
    </script>
  <script type="text/javascript">
    $(document).ready(function(){
       $("#share_blog").click(function(){
            $("#fb_blog,#gp_blog,#tw_blog").slideToggle();
        });        
      });
  </script>
</body> <?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>


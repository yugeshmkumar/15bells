<?php
/**
 * @var $this yii\web\View
 */
use frontend\assets\NewBlogsAsset;
use frontend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

use yii\widgets\ActiveForm;

NewBlogsAsset::register($this);
?>
 <?php $this->beginContent('@frontend/views/layouts/baseblog.php'); ?>
 


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
.menu{
	padding-top:40px;
}
.beta_lg {
    color:#ae924d !important;
       text-decoration: none !important;
    position: relative;
    font-size: 14px;
    font-weight: bold;
    top: 38px;
    right: 10px;
}
</style>
       
		 <link href="<?= Url::to('@web/') ?>toastr/toastr.css" rel="stylesheet">
    <link href="<?= Url::to('@web/') ?>toastr/toastr.min.css" rel="stylesheet">
 <div class="container-fluid no_pad">
	
	<div class="fixed_top hidden-xs hidden-sm">
		<div class="row">
			<div class="logo_div"  style="position:relative;">
				<span><a href="<?= Yii::$app->homeUrl ?>"><span class="trade_mrk">TM</span><img class="img_logo" src="<?= Yii::$app->request->baseUrl . '/frontimg/small.gif' ?>" width="90" style="margin:0 auto;"><span class="beta_lg">BETA</span></a></span><br>
				<span class="menu_m menu_drop mainbutton" id="">Menu</span>
			</div>
		</div>
		<div class="row menu_row menu">		
				<ul class="dropdown_menu">
    						<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->homeUrl ?>">Home</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a></li>
							<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a></li>
    						<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("aboutus") ?>">About Us</a></li>
    						<li><a class="sliding-middle-out link_clr" href="<?= Yii::$app->urlManager->createUrl("blogs") ?>">Blog</a></li>
               <?php if(yii::$app->user->isGuest) { ?>
              <li><a class="sliding-middle-out link_clr" href="<?php echo yii::$app->urlManager->createUrl(['user/sign-in/login']) ?>">Register/Login</a></li>
			  <?php } else { ?> 
			  						 <?php $arrcheckrole = \common\models\RbacAuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id])->all();
	                             foreach($arrcheckrole as $checkrole){
			$findallrouting = \common\models\Bellsroutings::find()->where(['isactive'=>1,'rolename'=>$checkrole->item_name])->one();
			if($findallrouting){ ?>
				<?php if($findallrouting->login_to == "backend"){ ?>
				 <li><a class="sliding-middle-out link_clr" href="<?php echo Yii::getAlias('@backendUrl') ?><?php echo $findallrouting->login_url ?>"> My Dashboard</a></li>
			  
				   <li> <?php echo Html::a(Yii::t('frontend', 'Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post','class'=>"sliding-middle-out link_clr"]) ?></li>

		   	      <?php } else{ ?>
				  <li><a class="sliding-middle-out link_clr" href="<?php echo Yii::$app->urlManager->createUrl($findallrouting->login_url); ?>"> My Dashboard</a></li>
			    <li> <?php echo Html::a(Yii::t('frontend', 'Log Out'), ['/user/sign-in/logout'], ['data-method' => 'post','class'=>"sliding-middle-out link_clr"]) ?></li>

			<?php } } } ?>
			  <?php } ?>
						   <li><a class="sliding-middle-out link_clr" onclick="opencon()" style="border-right:none !important; cursor: pointer;">Contact Us</a></li>
				</ul>	
	</div>
	
		
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
#mySidenav1 a{
	color:#000000 !important;
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
				                                  <i class="fa fa-phone" aria-hidden="true" style=" position: absolute;top: 67px;left: 80px; color:#2f78b4;font-size: 40px;width: 25px;"></i>+012-44037100<br><a style="color: #fff;" href="mailto:15bells.official@gmail.com">info@15bells.com</a></h1>
				                              </div>
				                  
				                
				                        </div>
				                      </div>
				                    </div>
				      </div>

				    </div>
				  </div>

				</section>
		<div class="row hidden-lg hidden-md mob_nav">
		<div class="col-md-12">
		 <div id="nav-container" class="nav_bars col-xs-4 col-sm-4 text-center" style="padding-top:15px;">
		 <i class="fa fa-bars fa-2x" onclick="openNav()"></i>
         </div>
		 <div class="col-sm-4 col-xs-4 text-center">
			 <a href="<?= Yii::$app->homeUrl ?>"><img class="img_logo" src="<?= Yii::$app->request->baseUrl . '/frontimg/small.gif' ?>" width="90" style="margin:0 auto;"></a>
		 </div>
		 <div class="col-sm-4 hidden-xs">
		 </div>
		 <div id="mySidenav1" class="sidenav1">
		  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close close_sml"></i></a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->homeUrl ?>">Home</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("buyer") ?>">Buyer</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("seller/seller") ?>">Seller</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessor/lessor") ?>">Lessor</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("lessee/lessee") ?>">Lessee</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("aboutus") ?>">About Us</a>
		   <a class="sliding-middle-out" href="<?= Yii::$app->urlManager->createUrl("user/sign-in/login") ?>">Register/Login</a>
		   <a class="sliding-middle-out" onclick="opencon()" style="cursor: pointer;">Contact Us</a>
		</div>
		</div>

	</div>
	 <?php echo $content ?>
	
	<!--==========First Section=========-->
	
		<!--======QUERY FORM==========-->
	
		<!-- Sliding div starts here -->
		<div id="slider" style="right:-342px;">
			<div id="sidebar" onclick="open_panel()"><span class="rotate">WE'RE HERE TO HELP</span></div>
				<div id="header">
					<h2>Contact Form</h2>
					<p>This is my form.Please fill it out.It's awesome!</p>
                    <?php $modeled = new \common\models\ChatContactUs(); ?>
            <?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"chatcontactus/create"]); ?>

            <?php echo $form->field($modeled, 'name')->textInput(['maxlength' => true, 'placeholder' => "Your Name", 'id' => 'chatname'])->label(false); ?>
            <?php echo $form->field($modeled, 'email')->textInput(['maxlength' => true, 'placeholder' => "Your Email", 'id' => 'chatemail'])->label(false); ?>
            <?php echo $form->field($modeled, 'role')->dropDownList(['Buyer' => 'Buyer', 'Seller' => 'Seller', 'Landlord' => 'Landlord', 'Tenant' => 'Tenant'],['prompt'=>'Select Role']); ?>
            <?php echo $form->field($modeled, 'message')->textarea(['rows' => '6', 'placeholder' => "Message", 'id' => 'chatmessage'])->label(false); ?>
				
            <?= Html::submitButton('Send Message', ['class' => 'btn btn-primary']) ?>
                    <?php ActiveForm::end(); ?>
				</div>
		</div>
	
	
	<!--======QUERY FORM==========-->
	
	
	
	 </body>
</html>

<?php $this->endBody() ?> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="<?= Url::to('@web/') ?>toastr/toastr.min.js"></script>
<?php
$script = <<< JS
        
 $('form#{$model->formName()}').on('beforeSubmit',function(e){
 
    e.preventDefault();
    e.stopImmediatePropagation();
   var form = $(this);
   $.post(
    form.attr("action"),
     form.serialize()
   
   ).done(function(result){
    
   if(result == 1){

        $(document).find('#slider').css("right","-342px");
        var chatid = $(document).find("#slider").eq(0).children(1).attr("id");
       
        
        var chatid = document.getElementById(chatid);
         chatid.setAttribute("id", "sidebar");
         
         chatid.setAttribute("onclick", "open_panel()");
        
        $(form).trigger("reset");
         toastr.success('Thanks for your time , Our Team will reach you Soon','success');
   
   }else{
 
        $('#message').html('Something Wrong');  
     }
          
   }).fail(function(){
      console.log("server Error"); 
   
   });
   return false;
   
 }); 
        
        
        
JS;
$this->registerJs($script);
?> 

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
function get_value()
{
	

	
var fullname=$('#fullname').val();

if (fullname.length < 3)
{
    alert('Please enter a name 3 characters or more.');
    return false;
}


var email=$('#email').val();
 emailReg = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
if(!emailReg.test(email) || email == '')
{
     alert('Please enter a valid email address.');
     return false;
}

var number=$('#number').val();
intRegex = /[0-9 -()+]+$/;
if((number.length < 6) || (!intRegex.test(number)))
{
     alert('Please enter a valid phone number.');
     return false;
}


var message=$('#message').val();
if(message == '')
{
     alert('Please enter a Message.');
     return false;
}		  

$('#submit').prop('disabled',true);    
alert('Thankyou for Contacting with us.');
$('#fullname').val('');
				$('#email').val('');
				$('#number').val('');
				$('#message').val('');				  
$.ajax({

                type: "POST",			
				url: "<?php echo Yii::$app->urlManager->createUrl(["contact-us/sendcontact"]) ?>",
				data : {fullname: fullname,email: email,number: number,message: message},
			
                
                success: function(data){
                    $('#csolo1umxc').html(data);
				
                $('#submit').prop('disabled',false); 
                }

            });
}
</script>
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
		$("#first_sec").show();
		$("#secnd_sec").hide();
		$("#abcd").hide();
		$("#section_e").hide();
	});
	$(".anchr_ex").click(function(){
		$("#first_sec").hide();
		$("#section_e").hide();
		$("#secnd_sec").show();
	});
	$(".skip_v").click(function(){
		$("#first_sec").hide();
		$("#abcd").show();
		$("#secnd_sec").hide();
		$("#section_e").hide();
	});
	
	
});

</script>


<?php $this->endContent(); ?>

		

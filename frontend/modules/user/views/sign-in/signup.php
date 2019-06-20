<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use common\models\Countries;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */
?>





<!------------Transaction types Section----------->

<div class="container-fluid no_pad signin_cont">
	<div class="row">
		<div class="col-md-6 no_pad hidden-xs">
			<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/signup1.jpg';  ?>" class="signup_img">
			<div class="signup_overlay">
				<p class=""><i class="fa fa-quote-left"></i>Proptech fulfilling the dreams for many as per the changing real estate consumer behavior. Welcome to the innovation of Commercial Real Estate .</p>
			</div>
		</div>
		<div class="col-md-6 no_pad">
			<div class="row pad_100">
				<div class="col-md-12 pad_40 signin_frm">	
					 <div class="multipage_form" style="overflow:auto;">
								<div>
								  <button class="buttn_prev" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
								 
								</div>
							  </div>
							  <!-- Circles which indicates the steps of the form: -->
							  <div style="text-align:center;height:0;">
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
								<span class="step"></span>
							  </div>
					<h2 class="login_head">Hello, Welcome back!</h2>
					<h2 class="signup_head">Welcome to 15 Bells</h2>
					 
					<ul class="nav nav-pills signup_tabs">
					  <li class="active"><a id="upperhome" class="anchr_sign signin_butn" data-toggle="pill" href="#home">Sign in</a></li>
					  <li><a id="uppermenu1" class="anchr_sign signup_butn" data-toggle="pill" href="#menu1">Sign up</a></li>
					</ul>

					<div class="tab-content">

					  <div id="home" class="tab-pane fade in active">
					
						<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
						       
								 <?=
								$form->field($model1, 'checkfield')->hiddenInput()->label(false);

								?>
						
						<div class="col-md-12 no_pad">
							<div class="form-group">
							<?php echo $form->field($model1, 'identity')->textInput(['class' => 'form-control input_desgn','placeholder'=>'Email or Phone no'])->label(false) ?>
							  <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
							</div>

							
							<button type="button" id="passwordit" class="otp_button">Signin by Password</button><span class="choose_login">OR</span>
							<button type="button" id="otpit" class="otp_button" style="float:right;">Signin by OTP</button>
							<button type="button" id="resendotp" class="otp_button" style="float:right;">Resend OTP</button>


							<div class="form-group" id="hideotp">
							  <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
								<?php echo $form->field($model1, 'userOTP')->textInput(['class' => 'form-control input_desgn','placeholder'=>'OTP'])->label(false) ?>
							 
							</div>
							<?=
								$form->field($model1, 'checkotp')->hiddenInput(['value'=>'error'])->label(false);

								?>

							<div class="form-group" id="hidepassword">
							  <!-- <input type="text" class="form-control input_desgn" placeholder="Email or Phone no"> -->
								<?php echo $form->field($model1, 'password')->passwordInput(['class' => 'form-control input_desgn','placeholder'=>'Password'])->label(false) ?>
							 
							</div>
							<!--<div class="checkbox">
							
							<?//php echo $form->field($model1, 'rememberMe')->checkbox() ?>
							   <label class="rembr_ch"><input type="checkbox" value="">Remember me</label> 
							</div>-->

							
							<p class="text-center">

	<?php echo Html::submitButton(Yii::t('frontend', '<img src="'.Yii::getAlias('@frontendUrl').'/newimg/img/lock.svg' .'" width="14" class="lock_img">Sign in securely'), ['class' => 'btn btn-default btn_signin', 'name' => 'login-button']) ?>
							<!-- <button class="btn btn-default btn_signin">
							<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/lock.svg';  ?>" width="14" class="lock_img">Sign in securely
							</button> -->
							</p>
							<!-- <p class="text-left tems_lin">By logging in, you agree to our<a href="" class="trms_butn"> Terms &amp; Conditions</a> &amp; <a href="" class="trms_butn">Privacy Policy </a></p> -->
							<p class="text-left tems_lin">Forgot Password?
							 
							 <?php echo Yii::t('frontend', '<a class="trms_butn" href="{link}">Click here</a>', [
                        'link'=>yii\helpers\Url::to(['sign-in/request-password-reset'])
                    ]) ?>
							 </p>
						</div>
						<?php ActiveForm::end(); ?>
					
					  </div>



            

					  <div id="menu1" class="tab-pane fade">

													 
                      <?php $form = ActiveForm::begin(['id' => 'form-signup','enableAjaxValidation' => true]); ?>
							<div class="tab">
							
								<p class="signup_input">
									<div class="dropdown">
										<label class="label_font" for="usr">I'm a</label>
										<!-- <button id="dLabel" class="form-control dropdown-select" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Select
										<span class="caret"></span>
										</button>
									  <ul class="dropdown-menu User_role" aria-labelledby="dLabel">
										<li>Buyer</li>
										<li>Seller</li>
										<li>Lessor</li>
										<li>Lessee</li>
									
                                      </ul> -->
                                      

                                      <?=
                                        $form->field($model, 'user_login_as')->dropDownList(
                                            ['buyer' => 'Buyer', 'seller' => 'Seller', 'lessor' => 'Lessor','lessee'=>'Lessee'], // Flat array ('id'=>'label')
                                                ['class' => 'form-control', 'prompt' => 'Select']    // options
                                        )->label(false);
                                        ?>

									</div></p>
									<p class="signup_input">
									<div class="dropdown">
									<label class="label_font">Choose your category</label>
									  <!-- <button id="dLabel1" class="form-control dropdown-select1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Select
										<span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu individual_drop" aria-labelledby="dLabel1">
										<li>Buyer</li>
										<li>Seller</li>
										<li>Lessor</li>
										<li>Lessee</li>
									
                                      </ul> -->
                                      <?php $arrgetloginas = \common\models\UserLoginAs::find()->where(['isactive' => 1])->all(); ?>
                                <?php
                                        $arrloginastconfig = \common\models\LoginAsConfig::find()->all();
                                        $lloginasdata = ArrayHelper::map($arrloginastconfig, 'name', 'name');
                                        ?>
                                        <?=
                                        $form->field($model, 'companytype')->dropDownList(
                                                $lloginasdata, // Flat array ('id'=>'label')
                                                ['class' => 'form-control companytyp', 'prompt' => 'Select']    // options
                                        )->label(false);
                                        ?>
									</div></p>
							
							  </div>
							  <div class="tab">
								
								<p class="signup_input">
                                    <!-- <input class="form-control input_desgn" placeholder="Full name" name="email"> -->

                                     <?=
                                                $form->field($model, 'fname', [
                                                'options' => [
                                                //'tag' => 'div',
                                               
                                                ],
                                                    //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                                            ])->textInput([
                                                'type' => 'text', 'placeholder' => "Full name" , 'class' => 'form-control input_desgn',
                                            ])->label(false)
                                            ?> 
                                
                                </p>
								<p class="signup_input">
                                    <!-- <input class="form-control input_desgn" placeholder="Enter you email address / Phone no." name="phone"> -->
                                    <?=
                                                $form->field($model, 'email', [
                                                'options' => [
                                                //'tag' => 'div',
                                               
                                                ],
                                                    //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                                            ])->textInput([
                                                'type' => 'email', 'placeholder' => "Enter you email address" , 'class' => 'form-control input_desgn',
                                            ])->label(false)
                                            ?>
                                </p>
								<!--<p class="or_text">or</p>-->	
                                <p class="signup_input">
                                    <!-- <input class="form-control input_desgn" placeholder="Enter you email address / Phone no." name="phone"> -->
                                    <?=$form->field($model, 'username', [
                                'options' => [
                                    //'tag' => 'div',
                                    //'class' => '',
                                ],
                                //'template' => '<span class="col-md-2 col-lg-2"><label class="control-label">Final item price</label>{input}{error}</span>'
                            ])->textInput([ 'placeholder' => "Enter your Phone no." , 'class' => 'form-control input_desgn'])->label(false)?>
                                </p>
								
							  </div>
							
							  <div class="tab">
							
								<p><input class="form-control input_desgn" id="appendphone" placeholder="" name="dd">
								<label class="verify_text">Please verify the <span id="phone1">phone number</span> by entering the OTP sent to your <span id="phone2">mobile number</span>.</label>
								</p>
							
								<p>
							
								<?=$form->field($model, 'otp')->textInput(['class'=>'form-control input_desgn'])->label(false)?>
								  
								</p>
							

              
								<p class="text-center">
								<?=
								$form->field($model, 'checkotp')->hiddenInput()->label(false);

								?>

								<?php echo Html::submitButton(Yii::t('frontend', 'Verify'), ['id' => 'mjhehit', 'class' => 'btn btn-default btn_signin', 'name' => 'signup-button']) ?>
								
								
								</p>
								<p class="text-left tems_lin">By registering to 15Bells, you agree to our<a href="javascript:void(0)" class="trms_butn"> Terms &amp; Conditions</a> &amp; <a href="javascript:void(0)" class="trms_butn">Privacy Policy </a></p>
							  </div>
							
							  <div class="tab">
								<p class="text-center"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/success.svg';  ?>" width="88"></p>
								<p class="success_text">Congratulations!! Your registration process is successfully completed.</p>
							  </div>
								<p class="text-center"><button class="btn btn-default btn_signin first_step" type="button" id="nextBtn" onclick="nextPrev(1)">Continue</button></p>
                     
                                <?php ActiveForm::end(); ?>
															
                            </div>
					 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
$script = <<< JS

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

var first = getUrlVars()["ifs"];


if(first == 'menu1'){
	
	$('#uppermenu1').trigger('click')
}

$('#hideotp').hide();
   $('#hidepassword').hide();
   $('#resendotp').hide();


 document.onkeydown = function(e) {
 if(event.keyCode == 123) {
 return false;
 }
 if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
 return false;
 }
 if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
 return false;
 }
 if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
 return false;
 }
 }

// $(document).bind("contextmenu",function(e){
//   return false;
// });


$(".first_step").click(function(event){
				var form_data=$("#contact").serializeArray();
				var error_free=true;
				for (var input in form_data){
					var element=$("#contact_"+form_data[input]['name']);
					var valid=element.hasClass("valid");
					var error_element=$("span", element.parent());
					if (!valid){error_element.removeClass("error").addClass("error_show"); error_free=false;}
					else{error_element.removeClass("error_show").addClass("error");}
				}
				if (!error_free){
					event.preventDefault(); 
				}
				// else{
				// 	alert('No errors: Form will be submitted');
				// }
			});
			
 $('.signup_butn').on('click', function() {
	$('.signup_head').show();
	$('.login_head').hide();
	$('.multipage_form').show();
});
$('.signin_butn').on('click', function() {
	$('.signup_head').hide();
	$('.multipage_form').hide();
	$('.login_head').show();
});
 $('.User_role li').on('click', function() {
  var getValue = $(this).text();
  $('.dropdown-select').text(getValue);
  
  $('#dLabel').val(getValue);
});
 $('.individual_drop li').on('click', function() {
  var getValue = $(this).text();
  $('.dropdown-select1').text(getValue);
$('#dLabel1').val(getValue);
});

showTab(currentTab); // Display the current tab


 $('#passwordit').click(function(){

	 $('#loginform-checkfield').val('password');

	$('#hideotp').hide();
   $('#hidepassword').show();

 });






 $('#resendotp').click(function(e){
		
		
	var identity = $('#loginform-identity').val();

		e.preventDefault();
		e.stopImmediatePropagation(); 
		var newotp =  generateOTP();
   
		 
	   
		   var phoneno = /^\d{10}$/;
		   if(identity.match(phoneno))
	{	 
   
		   $.ajax({
								type: "POST",
								url: 'resendotp',
								data: {phone : identity},
								success: function (data) {
									  
								},
						});
						return false;
   
				}
   
			   else if (isValidEmailAddress(identity)) {
		   
				$.ajax({
				   type: "POST",
				   url: 'sendemail',
				   data: {emailid : identity,newotp:newotp},
				   success: function (data) {
					   
					$('#loginform-checkotp').val(newotp);
						 
				   },
			   });
   
			   return false;
	   }		 
				else
				{
					alert('Not a valid Input');
					   
				}
   
				return false;   
	
   });


    $('#otpit').click(function(e){



		$('#loginform-checkfield').val('otp');


	 e.preventDefault();
	 e.stopImmediatePropagation(); 
	 var newotp =  generateOTP();

	  var identity = $('#loginform-identity').val();
	
		var phoneno = /^\d{10}$/;
		if(identity.match(phoneno))
 {	 
	    $('#otpit').hide();
		$('#hideotp').show();
		$('#resendotp').show();
		$('#hidepassword').hide();

		$.ajax({
							 type: "POST",
							 url: 'rgetotp',
							 data: {phone : identity,newotp:newotp},
							 success: function (data) {
								       
							 },
					 });
					 return;

			 }

			else if (isValidEmailAddress(identity)) {

				$('#otpit').hide();
				$('#hideotp').show();
		        $('#resendotp').show();
				$('#hidepassword').hide();
        
			 $.ajax({
                type: "POST",
				url: 'sendemail',
                data: {emailid : identity,newotp:newotp},
                success: function (data) {
                    
                   // toastr.success('OTP has been Send to your Mobile Number','success');
                   // $.pjax.reload({container: '#pjax-grid-view', async:false}); 

									
                     $('#loginform-checkotp').val(newotp);
                      
                },
            });

						return;
    }		 
			 else
			 {
				 alert('Not a valid Input');
					
			 }

			
 
});


 $('#loginform-userotp').keyup(function(){

var identity = $('#loginform-identity').val();
var newotp = $('#loginform-userotp').val();
var checkotp =  $('#loginform-checkotp').val()

 var phoneno = /^\d{10}$/;
	   if(identity.match(phoneno))
{
	var type = 'phone';
}else{

	var type = 'email';
}

if(newotp != '' && newotp.length===4){


$.ajax({
						 type: "POST",
						 url: 'rverifyotp',
						 data: {phone : identity,newotp:newotp,type:type},
						 success: function (data) {

							 if(type == 'email'){

								if(checkotp == newotp){

									$('#loginform-checkotp').val('success');

								}else{
									//alert('Please click on resend OTP');
									$('#loginform-checkotp').val('error');
								}

									
							 }else{

								$('#loginform-checkotp').val(data);	

							 }

												
								  
						 },
				 });

 }


});
 



JS;
$this->registerJs($script);
?>
 
<script>
window.onload = function () {
    // for onload animation
    

    setTimeout(function () {
        if (document.querySelector(".steps_cont")) {
            document.querySelector(".steps_cont").classList.add("steps_cont_show");
        }
    }, 2000)
    // for onload animation (End)
}
    var currentTab = 0; // Current tab is set to be the first tab (0)

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};






function nextPrev(n) {

// This function will figure out which tab to display
var x = document.getElementsByClassName("tab");
// Exit the function if any field in the current tab is invalid:
if (n == 1 && !validateForm()) return false;
// Hide the current tab:
x[currentTab].style.display = "none";
// Increase or decrease the current tab by 1:
currentTab = currentTab + n;
// if you have reached the end of the form...
// if (currentTab >= x.length) {
// // ... the form gets submitted:
// document.getElementById("regForm").submit();
// return false;
// }
// Otherwise, display the correct tab:
if(currentTab > 1){

var emailid = 	$('#signupform-email').val();
var username = 	$('#signupform-username').val();
if (!emailid.trim()) {
	sendotp(username);
	$('#appendphone').val(username);

}else if(!username.trim()) {


	$('#phone1').html('Email id');
	$('#phone2').html('email id');
	$('#appendphone').val(emailid);
	sendemail(emailid);

}else{

  sendotp(username);
	$('#appendphone').val(username);
}


}
showTab(currentTab);

}


function generateOTP() { 
		
		// Declare a digits variable 
		// which stores all digits 
		var digits = '0123456789'; 
		let OTP = ''; 
		for (let i = 0; i < 4; i++ ) { 
				OTP += digits[Math.floor(Math.random() * 10)]; 
		} 
		return OTP; 
} 


function sendotp(mobile){

var newotp =  generateOTP();

	 $.ajax({
                type: "POST",
                url: "<?= Yii::getAlias('@frontendUrl').'/user/sign-in/rgetotp';  ?>",
                data: {phone : mobile,newotp:newotp},
                success: function (data) {
                    
                   // toastr.success('OTP has been Send to your Mobile Number','success');
                   // $.pjax.reload({container: '#pjax-grid-view', async:false}); 

									
                     $('#signupform-checkotp').val(newotp);
                    // $('#signupform-fname').val(fname);
                    // $('#signupform-lname').val(lname);
                    // $('#signupform-user_login_as').val(user_login_as);
                    // $('#signupform-companytype').val(companytype);
                    // $('#signupform-companyname').val(companyname);
                    // $('#signupform-email').val(email);
                    // $('#password-field').val(password);
                    
                   // $('#otpit').hide();        
                },
            });

	
}



function sendemail(emailid){

var newotp =  generateOTP();

	 $.ajax({
                type: "POST",
                url: "<?= Yii::getAlias('@frontendUrl').'/user/sign-in/sendemail';  ?>",
                data: {emailid : emailid,newotp:newotp},
                success: function (data) {
                    
                   // toastr.success('OTP has been Send to your Mobile Number','success');
                   // $.pjax.reload({container: '#pjax-grid-view', async:false}); 

									
                     $('#signupform-checkotp').val(newotp);
                    // $('#signupform-fname').val(fname);
                    // $('#signupform-lname').val(lname);
                    // $('#signupform-user_login_as').val(user_login_as);
                    // $('#signupform-companytype').val(companytype);
                    // $('#signupform-companyname').val(companyname);
                    // $('#signupform-email').val(email);
                    // $('#password-field').val(password);
                    
                   // $('#otpit').hide();        
                },
            });

	
}



function showTab(n) {
   
   // This function will display the specified tab of the form...
   var x = document.getElementsByClassName("tab");
   x[n].style.display = "block";
   //... and fix the Previous/Next buttons:
   if (n == 0) {
     document.getElementById("prevBtn").style.display = "none";
   } else {
     document.getElementById("prevBtn").style.display = "inline";
   }
   if (n > 1) {
     document.getElementById("nextBtn").style.display = "none";
   } else {
     document.getElementById("nextBtn").style.display = "block";
     document.getElementById("nextBtn").innerHTML = "Continue";
   }
   //... and run a function that will display the correct step indicator:
   fixStepIndicator(n)
 }
 
 
 
 function validateForm() {
   // This function deals with validation of the form fields
   var x, y, i, valid = true; var count ;

   x = document.getElementsByClassName("tab");
	 
   y = x[currentTab].getElementsByClassName("form-control");
	 
	 count =  y.length;

	 
   // A loop that checks every input field in the current tab:
   for (i = 0; i < count; i++) {

		 if(currentTab == 1){		 
		   	
			 if(i>0){
				
					var emailid   =  y[1].id;
					var phoneid   =  y[2].id;	

				 	if ((y[1].value == "")  &&  (y[2].value == "")) {	 

					y[i].className += " invalid";
				
					valid = false;
				}
				else if($('#'+emailid).parent().hasClass("has-error") ||  $('#'+phoneid).parent().hasClass("has-error")){

					y[i].className += " invalid";

					valid = false;

					}

			 }else{

						if (y[i].value == "") {	       
					  y[i].className += " invalid";
				
					  valid = false;
                  }


			 }
		 } else{

     // If a field is empty...
     if (y[i].value == "") {	 
       // add an "invalid" class to the field:
       y[i].className += " invalid";
       // and set the current valid status to false
       valid = false;
       }
		 }



   }
   // If the valid status is true, mark the step as finished and valid:
   if (valid) {
     document.getElementsByClassName("step")[currentTab].className += " finish";
   }
   return valid; // return the valid status
 }
 
 function fixStepIndicator(n) {
   // This function removes the "active" class of all steps...
   var i, x = document.getElementsByClassName("step");
   for (i = 0; i < x.length; i++) {
     x[i].className = x[i].className.replace(" active", "");
   }
   //... and adds the "active" class on the current step:
   x[n].className += " active";
 }


</script>    

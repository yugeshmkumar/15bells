<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Growl;
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\PasswordResetRequestForm */

$this->title =  Yii::t('frontend', 'Request password reset');
$this->params['breadcrumbs'][] = $this->title;
?>


  <?php if(isset($sd)){
	if($sd == 1){
	
	echo Growl::widget([
    'type' => Growl::TYPE_SUCCESS,
    'title' => 'Successful!',
    'icon' => 'glyphicon glyphicon-ok-sign',
    'body' => 'Please check your email and set password from reset password link.',
    //'showSeparator' => true,
   // 'delay' => 1000,
    'pluginOptions' => [
        'showProgressbar' => false,
        'placement' => [
            'from' => 'top',
            'align' => 'right',
        ]
    ]
]);

	
	
} }
?> 
                                    

<div class="container-fluid no_pad signin_cont">
	<div class="row">
		<div class="col-md-6 no_pad">
			<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/signup1.jpg';  ?>" class="signup_img">
		</div>
		<div class="col-md-6 no_pad">
			<div class="row pad_100">
				<div class="col-md-12 pad_40 signin_frm">
					<a href="" class="buttn_prev" type="button"><i class="fa fa-angle-left"></i> Back</a>				
					<h2 class="forgot_password">Forgot Password</h2></h2>
          <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

					<p class="signup_input">
					<label class="password_label">Please input your email address / Phone no.</label>
          <?php echo $form->field($model, 'username')->label(false)->textInput([
                                        'placeholder' => "9687878787",'class'=>"form-control input_desgn"]); ?>
					<!-- <input class="form-control input_desgn" placeholder="9687878787" name="email" /> -->
          
          </p>
					<p class="signup_input">
					<label class="password_label">Please verify the phone number by entering the OTP sent to your mobile number.</label>
          <?=$form->field($model, 'otp')->textInput(['placeholder' => "******",'class'=>'form-control input_desgn'])->label(false)?>

          </p>

          <button type="button" id="otpit" class="otp_button">Get one time password (OTP)</button>
					<p class="text-center">

          <?=	$form->field($model, 'checkotp')->hiddenInput()->label(false);	?>
          <?php echo Html::submitButton('Submit', ['class' => 'btn btn-default btn_signin']) ?>  </div>

          </p>

           <?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
$script = <<< JS


 $('#otpit').click(function(e){
   
	 e.preventDefault();
	 e.stopImmediatePropagation(); 
	 var newotp =  generateOTP();

	  var identity = $('#passwordresetrequestform-username').val();
	
		var phoneno = /^\d{10}$/;
		if(identity.match(phoneno))
 {	 

		$.ajax({
							 type: "POST",
							 url: 'rgetotp',
							 data: {phone : identity,newotp:newotp},
							 success: function (data) {
								 //  alert(data); 						
								 $('#passwordresetrequestform-checkotp').val(newotp);
									 
									// $('#otpit').hide();        
							 },
					 });
					 return;

			 }

		
			 else
			 {
				 alert('Not a valid Input');
					
			 }

			
 
});



JS;
$this->registerJs($script);
?>

<script>


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

</script>
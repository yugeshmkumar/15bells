<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

//$this->title = Yii::t('app', 'Contact-Us');
?>
<style>
.nav_bg{
	background:#10101d !important;
} 
</style>
<div class="container-fluid no_pad">
			<div class="row no_margin">
					<div class="col-md-7 no_pad">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.8859886816517!2d77.09350231507926!3d28.482979982476987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19243dbca3a1%3A0x18296625c08803fa!2s15bells.com!5e0!3m2!1sen!2sin!4v1531200688886" id="address_map" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="col-md-5 contct_form">
						<div class="row text-center">
							<img src="../newimg/logo.png" width="100">
							<h3 class="contct_lin">Get To Know Us</h3>
							<p class="contct_queries">Want to know more? <br> Connect with us on a call, drop a mail or drop by for a meeting. Have a hectic schedule? Leave your mail address and other contact details and our 15 Bells executive will connect with you within 24 hours.</p>
						</div>
						<div class="row form_contct">
						
						<?php $modeled = new \common\models\ContactUs(); ?>
						
					<?php $form = ActiveForm::begin(['id' => $modeled->formName(),'action'=>"contact-us/sendcontact"]); ?>

							<div class="col-md-12 same_pad">
								<div class="col-md-6 no_pad">
									<!-- <input type="text" class="form-control contact_input" placeholder="Your Name"> -->
						<?php echo $form->field($modeled, 'full_name')->textInput(['placeholder' => "Your Name",'class'=>"form-control contact_input"])->label(false); ?>

								</div>
								<div class="col-md-6 last_nam">
					  <?php echo $form->field($modeled, 'email')->textInput(['maxlength' => true, 'placeholder' => "Your Email",'class'=>"form-control contact_input",'id' => 'chatemail'])->label(false); ?>

								</div>
							</div>
							<div class="col-md-12 same_pad">
								<!-- <textarea class="form-control contact_input" placeholder="TELL US EVERYTHING" rows="3" id="comment"></textarea> -->
		    <?php echo $form->field($modeled, 'message')->textarea(['class'=>"form-control contact_input",'rows' => '6', 'placeholder' => "TELL US EVERYTHING", 'id' => 'chatmessage'])->label(false); ?>

							</div>
							
										
							<div class="col-md-12 same_pad full_width">
								
								<?= Html::submitButton('Lets get started', ['class' => 'btn btn-primary submt_butn contct_submt','onClick'=>'ga("send", "event", "Contactus Submit Button", "Contactus Submit Button", "Contactus Submit Button","Contactus Submit Button")']) ?>
							</div>
							
							 <?php ActiveForm::end(); ?>
							<div class="col-md-12 text-center same_pad full_width">
								<div class="contct_p"><div class="col-md-3 text-right">E-Mail:</div><div class="col-md-9 text-left"> info@15bells.com</div></div>
								<div class="contct_p"><div class="col-md-3 text-right">Call:</div><div class="col-md-9 text-left"> 0124-4037100 <br> +91-8130109696</div></div>
								<div class="contct_p"><div class="col-md-3 text-right">Address:</div><div class="col-md-9 text-left"> 21/22, 9th Floor, Tower A, Emaar Digital greens, Gurgaon Sec-61, Haryana(122101)</div></div>
							</div>
						</div>
					</div>
				</div>
	</div>
	<?php
$script = <<< JS
        
 $('form#{$modeled->formName()}').on('beforeSubmit',function(e){
 
    e.preventDefault();
    e.stopImmediatePropagation();
   var form = $(this);
   toastr.success('Thanks for your time , Our Team will reach you Soon','success');
   $.post(
    form.attr("action"),
     form.serialize()
   
   ).done(function(result){
   
   if(result == 1){      
       
        $(form).trigger("reset");
         
   
   }else{
 
	toastr.error('Server Error','error');

     }
          
   }).fail(function(){
      console.log("server Error"); 
   
   });
   return false;
   
 }); 
        
        
        
JS;
$this->registerJs($script);
?>  
	 <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

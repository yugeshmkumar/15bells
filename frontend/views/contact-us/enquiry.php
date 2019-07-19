<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

//$this->title = Yii::t('app', 'Contact-Us');
?>

<style>

</style>

<div class="container-fluid no_pad signin_cont">
	<div class="row">
		<div class="col-md-6 no_pad hidden-xs hidden-sm">
			<img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/signup1.jpg';  ?>" class="signup_img">
			<div class="contactus_content">
				<p class="contact_bold">Let’s discuss the recommended solution for your next investment</p>
				<p class="contact_para">From a background in real eastate, our team has formed a common goal to bring together the best and brightest to do something truely remarkable. We are focused on building solutions where no one gets the short end to stick.</p>
			</div>
		</div>
		<div class="col-md-6 no_pad">
			<div class="row pad_100 padding_enquiry">
			
			<?php $form = ActiveForm::begin(['id' => $model->formName(),'action'=>"sendcontact"]); ?>
				<div class="col-md-12">
					<a href="javascript:void(0)" id="prevBtn" class="buttn_prev" onclick="nextPrev(-1)" type="button"><i class="fa fa-angle-left"></i> Back</a>				
                    <a href="javascript:void(0)" id="prevBtn1" class="buttn_prev" type="button"><i class="fa fa-angle-left"></i> Back</a>				

                   
						<!-- One "tab" for each step in the form: -->
						<div class="tab">
							<div class="row">
							<h2 class="discuss_head">What you want to discuss about?</h2>
							<div class="col-md-8 col-xs-8">
							<ul class="contact_enquiry">
								<li class="">Buy Property</li>
								<li class="property_check">Lease In</li>
								<li class="property_check">Sell Property</li>
								<li class="property_check">Lease Out</li>
							</ul>
							</div>
								<div class="col-md-4 col-xs-4 role_selector">

								<?php $fruits = ['buy'=>'buy', 'lease_in'=>'lease_in','sell'=>'sell','lease_out'=>'lease_out']; ?>
								  <?=

								 $form->field($model, 'role_name')->checkboxList($fruits, [

										'item' => function($index, $label, $name, $checked, $value) {

											return "<label class='label_check relative'><input type='checkbox' {$checked} name='{$name}' value='{$value}' class='form-control def_check'><div class='check'></div></label>";

										}

								])->label(false);

								?>					 
							
						  <!-- <p><div class="form-group contact_dicuss">
								  <input class="form-control contact_detail" type="checkbox" id="lessee" value=""><label for="lessee">Lease In</label>
								</div></p>
						  <p><div class="form-group contact_dicuss">
								  <input class="form-control contact_detail" type="checkbox" id="sell" value=""><label for="sell">Sell Property</label>
								</div></p>
						  <p><div class="form-group contact_dicuss">
								  <input class="form-control contact_detail" type="checkbox" id="lessor" value=""><label for="lessor">Lease Out</label>
								</div></p> -->
								</div>
								</div>
						</div>

						<div class="tab">
						  <h2 class="discuss_head">When shall we contact you?</h2>
						  <p class="col-md-12">


              <?php $model->day_noon='Morning'; ?>
						
              
                <?=
                    $form->field($model, 'day_noon')
                        ->radioList(
                            ['Morning' => 'Morning', 'Afternoon' => 'Afternoon'],
                            [
                                'item' => function($index, $label, $name, $checked, $value) {
 
                                  if($value == 'Morning'){

                               //  $return = '<div class="radio"><label>';
                               //  $return .= '<input type="radio" name="' . $name . '"  checked="' . $checked . '" value="' . $value . '" >';
                               //  $return .= '<i></i>';
                               //  $return .= '<span>' . ucwords($label) . '</span>';
                               //  $return .= '</label></div>';
									
									
									
									$return = '<label class="col-md-6 check_box">Morning';
                                    $return .= '<input type="radio" name="' . $name . '"  checked="' . $checked . '" value="' . $value . '" >';
                                   
                                    //$return .= '<span>' . ucwords($label) . '</span>';
                                    $return .= '<span class="checkmark"></span>';
                                    $return .= '</label>';

                                  }else{

                                    $return = '<label class="col-md-6 check_box">Afternoon';
                                    $return .= '<input type="radio" name="' . $name . '"  value="' . $value . '" >';
                                    $return .= '<i></i>';
                                    $return .= '<span class="checkmark"></span>';
                                    $return .= '</label>';

                                  }
                                    

                                    return $return;
                                }
                            ]
                        )
                    ->label(false);
                    ?>


							

							<!-- <label class="col-md-6 check_box">Afternoon
							  <input class="form-control" type="radio" name="radio">
							  <span class="checkmark"></span>
							</label> -->
              
              </p>
						</div>
						 <div class="tab contact_form">
             <div id="loading0">
							<p>
							<label class="label_font" for="usr">Full Name*</label>
              <?php echo $form->field($model, 'full_name')->textInput(['class'=>"form-control contact_detail"])->label(false); ?>

							<p>
							<label class="label_font" for="usr">Email Address*</label>
              <?php echo $form->field($model, 'email')->textInput(['class'=>"form-control contact_detail"])->label(false); ?>
              </p>
							<p>
							<label class="label_font" for="usr">Phone Number*</label>
              <?php echo $form->field($model, 'contact_number')->textInput(['class'=>"form-control contact_detail"])->label(false); ?>

							<p>
							<label class="label_font" for="usr">Message</label>
              <?php echo $form->field($model, 'message')->textarea(['class'=>"form-control message_field"])->label(false); ?>
              </div>
              <div class="loaderContainer" style="display:none;">
              <div class="loader">Loading...</div>
             </div> 
						
							
						  </div>

                          <div class="tab">
								<p class="text-center"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/success.svg';  ?>" width="88"></p>
								<p class="success_text">Congratulations !!  Your contact us query has been successfully sent.</p>
							  </div>
						
						<div style="overflow:auto;float:left;">
							<div style="">
              <?= Html::submitButton('Continue <i class="fa fa-angle-right next_icon"></i>', ['id'=>'nextBtnrep','class' => 'discuss_continue']) ?>

							  <button type="button" id="nextBtn" class="discuss_continue" onclick="nextPrev(1)">Continue <i class='fa fa-angle-right next_icon'></i></button>
							</div>
						  </div>
						  <!-- Circles which indicates the steps of the form: -->
						  <div style="text-align:center;margin-top:40px;">
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
							<span class="step"></span>
						  </div>
						

						
				</div>
				
				 <?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
</div>

<?php
$script = <<< JS


showTab(currentTab); // Display the current tab

// $(function(){
//       $('#nextBtn').click(function(){       
//         $(':checkbox:checked').each(function(i){
            
//             $(this).val($(this).attr('id'))
//         });
//       });
//     });


//     $('form#{$model->formName()}').on('beforeSubmit',function(e){
     

//  e.preventDefault();
//  e.stopImmediatePropagation();
// var form = $(this);
// var formData = form.serialize();
// toastr.success('Thanks for your time , Our Team will reach you Soon','success');
// $.post(
//  form.attr("action"),
//   form.serialize()

// ).done(function(result){

// if(result == 1){  

 
//   nextPrev(1);
      

// }else{

// toastr.error('Server Error','error');

//   }
       
// }).fail(function(){
//    console.log("server Error"); 

// });
// return false;

// }); 




$('form#{$model->formName()}').on('beforeSubmit', function(e) {

var form = $(this);

var formData = form.serialize();

$.ajax({

    url: form.attr("action"),

    type: form.attr("method"),

    beforeSend: function(){
      //$(".loaderContainer").css("display","block");
     $(".loaderContainer").show();
     $("#loading0").hide();
   },
   complete: function(){
     $(".loaderContainer").hide();
     
   },

    data: formData,

    success: function (data) {

        nextPrev(1);

    },

    error: function () {

        alert("Something went wrong");

    }

});

}).on('submit', function(e){

e.preventDefault();

});


JS;
$this->registerJs($script);
?>


<script>


var currentTab = 0; // Current tab is set to be the first tab (0)


function showLoading(){
  alert('before loading');
}

function showTab(n) {

   
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  
    x[n].style.display = "block";
  
  
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("prevBtn1").style.display = "inline";
    document.getElementById("nextBtnrep").style.display = "none";
    
  } else if(n > 2){

    if(n == 3){
      document.getElementById("prevBtn1").style.display = "none";
      document.getElementById("prevBtn").style.display = "none";
      document.getElementById("nextBtnrep").style.display = "none";
    }

  }else if (n == 2){
   
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("nextBtnrep").style.display = "block";

  }else{
    document.getElementById("nextBtn").style.display = "block";
    document.getElementById("nextBtnrep").style.display = "none";
    document.getElementById("prevBtn1").style.display = "none";
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
   
  } else {
    document.getElementById("nextBtn").innerHTML = "Continue <i class='fa fa-angle-right next_icon'></i>";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

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
 
  // Otherwise, display the correct tab:
    showTab(currentTab);
  
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("form-control");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if(currentTab == 0){
        
    if ($('input:checkbox').filter(':checked').length < 1){
           
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
    }
    else {

        
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
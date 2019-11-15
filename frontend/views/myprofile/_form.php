<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\bootstrap\Modal;
use kartik\widgets\DepDrop;
//use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
 

 $userid = Yii::$app->user->identity->id;
 $user = \common\models\User::find()->where(['id'=>$userid])->one();
 $userprofile =\common\models\UserProfile::find()->where('user_id =:userid',array(':userid'=>$userid))->one();
 $userprofileex=\common\models\UserProfileEx::find()->where(['user_id'=>$userid])->one();
  $myprofile=\common\models\Myguardprofile::find()->where('userID =:userid and guardianprofileid <=:config',array(':userid'=>$userid ,':config'=>1))->one();

 ?>

		 <?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						
						$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_KYC_upload");
						if($getprofilestatus1){$count1 = $getprofilestatus1->process_status ;}
						else{$count1 = 0;}
						?>
                 
                                          
										 <!-- end  upper section -->
										 	 <!-- start MTPROFILE -->
									
											  <?php $form = ActiveForm::begin(); ?>
                                          
													<div class="note note-info note_sam"> <i class="fa fa-user"></i> Guardian Particulars</div>
                                                        <form role="form" action="#">
														<div class="row">
														 
														<div class="col-md-3">
														 <div class="form-group">
                                                                <label class="control-label">Title<font color="red">*</font></label>
																<?php
																if($myprofile){
																 if($myprofile->title){
                                                                 $model->title=$myprofile->title;
																}}
                                                                     ?>
                                                                  <?= $form->field($model, 'title')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ],['prompt'=>'Select..'])->label(false); ?>
                                                                       </div></div>
                                                                                                                    
                                                                                                                    
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">First Name<font color="red">*</font></label>
                                                    <?php
                                                    if($myprofile){
                                                     if($myprofile->first_name){
                                                    $model->first_name=$myprofile->first_name;
                                                    }}
                                                    ?>
                                                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(false); ?>
                                                    </div></div>
                                                                                                                    
                                                    <div class="col-md-4">
                                                    <div class="form-group">
                                                    <label class="control-label">Middle Name</label>
                                                    <?php
                                               
                                                    if($myprofile){
                                                     if($myprofile->middlename){
                                                    $model->middlename=$myprofile->middlename;
                                                    }}
                                                   
                                                    ?>
                                                    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true])->label(false); ?>
                                                    </div> </div>
                                                                                                                    
                                                                                                                    
                                                   
                                                                                                                
                                                                                                                </div>
																
																<div class="row">
                                                                                                                                    
                                                                                                                                     <div class="col-md-3">
                                                    <div class="form-group">
                                                    <label class="control-label">Last Name<font color="red">*</font></label>
                                                    <?php
                                                    if($myprofile){
                                                     if($myprofile->last_name){
                                                    $model->last_name=$myprofile->last_name;
                                                    }}
                                                    ?>
                                                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(false); ?>
                                                    </div> </div>
														
																<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">Gender<font color="red">*</font></label>
																 <?php
																if($myprofile){
																 if($myprofile->gender){
                                                                 $model->gender=$myprofile->gender;
																}}
                                                                     ?>
                                                                   <?= $form->field($model, 'gender')->dropDownList(['male' => 'Male', 'female' => 'Female' ],['prompt'=>'Select..'])->label(false); ?></div></div>
																<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">DOB<font color="red">*</font></label>
																 <?php
																if($myprofile){
																 if($myprofile->dob){
																	 $myprofile->dob=$myprofile->dob;
																}}
																	 ?>
																	
																	<?php 
																	echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter DOB ...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
])->label(false); ?>
																
                                                                 </div> </div>
                                                                                                                                    
                                                
                                                                                                                                    
                                                                                                                                    
                                               
																
																</div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                <div class="form-group">
                                                <?php
                                                if($myprofile){
                                                 if($myprofile->martial_status){
                                                $model->martial_status=$myprofile->martial_status;
                                                }}
                                                ?>
                                                <label class="control-label">Martial Status<font color="red">*</font></label>
                                                <?= $form->field($model, 'martial_status')->dropDownList(['Married' => 'Married', 'Single' => 'Single' ],['prompt'=>'Select..'])->label(false) ?> 
                                                </div> 
                                                </div>
                                                                                                                                    
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <?php
                                                if($myprofile){
                                                 if($myprofile->nationality){
                                                $model->nationality=$myprofile->nationality;
                                                }}
                                                ?>
                                                <label class="control-label">Nationality<font color="red">*</font></label>
                                                <?= $form->field($model, 'nationality')->dropDownList(['Indian citizen' => 'Indian', 'NRI' => 'NRI','OCI'=> 'OCI','PIO'=> 'PIO'],['prompt'=>'Select..','onChange'=>"focalnation()"])->label(false) ?> 
                                                </div> 
                                                </div><div class="col-md-4">
                                                <div class="form-group"> <label class="control-label">Relationship with Minor</label>
               <?= $form->field($model, 'relatnshp_with_minor')->textInput(['maxlength' => true])->label(false); ?>
                                                      </div> 
                                                </div>     
												<div class="col-md-4">
												  <div class="form-group" style="display:none">
															    
															<?php
																if($myprofile){
                                                                                                                                    
																 if($myprofile->isMinor){ ?>
																 <?php  if($myprofile->isMinor =="Yes"){  ?>
																	 <select id="myprofile_isminor" class="form-control" onChange="focaldiv()" name="isMinor">
                                                                                     <option value="No">No</option>
                                                                     <option value="Yes" selected>Yes</option>
                                                                             </select>
																	       <label class="control-label">A) Relationship with Minor</label>
																	    <input type="text" class="form-control" value="<?php echo $myprofile->relatnshp_with_minor ?>">
																		    <label class="control-label">B) Guardian Name</label>
																		  <input type="text" class="form-control" value="<?php echo $myprofile->guardian_name ?>">
																 <?php } ?>
																  <select id="myprofile_isminor" class="form-control" onChange="focaldiv()" name="isMinor">
                                                                                     <option value="No" selected>No</option>
                                                                     <option value="Yes">Yes</option>
                                                                             </select>	
                                                               	<?php } } else { ?>
																			  
                                                                 <select id="myprofile_isminor" class="form-control" onChange="focaldiv()" name="isMinor">
                                                                                     <option value="No">No</option>
                                                                     <option value="Yes">Yes</option>
                                                                             </select>								 <?php } ?>
				
																</div>
                                                            </div> </div>
															
														<div class="row">
														
																<div class="col-md-4 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Country Identification Number<font color="red">*</font></label>
																
																
															 <?= $form->field($model, 'pan_card_no')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'PAN Card'])->label(false); ?>
                                                   
                                                               </div></div>
																
																<div class="col-md-4 col-xs-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Aadhaar Card<font color="red">*</font></label>
																
													<?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Adhar Card'])->label(false); ?>
                                                   
                                                               </div></div>
																</div>
														<div class="row">
														
																<div class="col-md-4 col-xs-6">
                                                          </div>
																</div>
																<div class="row">
														  <div id="divo1x" style="display:none;"> 
																<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">A) Relationship with Minor</label>
                                                                <input type="text" name="minorrelation" id="minorrelation"    style=" display:none;"  class="form-control"> 
                                                                     
																</div></div>
																</div></div>
																
																<div class="row">
														 <div id="divo2x" style="display:none;"> 
																<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="control-label">B) Guardian Name</label>
                                                                <input type="text" name="guardianname" id="guardianname"    style=" display:none;"  class="form-control"> 
	
																</div></div>
																</div></div>
                                                            <div class="form-group">
                                                                <div class="note note-info note_sam">  <label class="control-label">
                                                        <!--<button class="add_field_button1"><i class="fa fa-plus"></i></button>-->Contact Number<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b></b></i></label></div>
                                                      <!-- -->
													  <div class="input_fields_wrap1 row">
													   <div class="row">
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Primary Number Type<font color="red">*</font></label>
															<?= $form->field($model, 'phonetypeprimary')->dropDownList(['Mobile' => 'Mobile', 'Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Primary Number<font color="red">*</font></label>
															 <?= $form->field($model, 'phonenumbersprim')->textInput(['type' => 'number','class'=>'form-control phone_no'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div></div>
															
															 <div class="row">
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Secondary Number Type</label>
															<?= $form->field($model, 'phonetypesecondary')->dropDownList(['Mobile' => 'Mobile', 'Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Secondary Number </label>
															 <?= $form->field($model, 'phonenumbersecondary')->textInput(['type' => 'number','class'=>'form-control phone_no'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div>
															
															</div></div></div>
															 <div class="form-group">
                                                                <div class="note note-info note_sam">  <label class="control-label">
                                                        <!--<button class="add_field_button1"><i class="fa fa-plus"></i></button>--> Contact E-mail<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b></b></i></label></div>
                                                      <!-- -->
													  <div class="input_fields_wrap1 row">
													   
															 <div class="row">
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Primary E-mail Type<font color="red">*</font></label>
															<?= $form->field($model, 'emailtypeprimary')->dropDownList(['Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Primary E-mail<font color="red">*</font></label>
															 <?= $form->field($model, 'emailnumbersprim')->textInput(['type' => 'email','class'=>'form-control'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div></div>
															
															 <div class="row">
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Secondary E-mail Type</label>
															<?= $form->field($model, 'emailtypesecondary')->dropDownList(['Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other' ],['prompt'=>'Select type..','class'=>"form-control"])->label(false); ?>
																
															  
															</div>
															
															<div class="col-md-5 col-xs-5">
															 <label class="control-label">Secondary E-mail </label>
															 <?= $form->field($model, 'emailnumbersecondary')->textInput(['type' => 'email','class'=>'form-control'])->label(false); ?>
                                                   
																<!--<span class="help-block"> (999) 999-9999 </span>-->
															</div>
															
															</div>
															
															</div></div>
                                                       
														 <div class="form-group">
                                                                <div class="note note-info note_sam"> <label class="control-label">Correspondence  address<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b></b></i></label></div>
                                                               <div class="input_fields_wrap2">
                                                            <div class="row">
																<div class="col-md-12" style="padding:8px 0 20px 0;">
																	
																<div class="col-md-12">
<!--																	<div class="col-md-1 butn_ad col-xs-1">
																	<button class="add_field_button2"><i class="fa fa-plus"></i></button> 
																	</div>-->
																	<div class="col-sm-3 col-xs-5">
																	<?= $form->field($model, 'countrynewId')->dropDownList(['india' => 'India'],['class'=>"form-control countries"])->label(false); ?>
															
																			
																	</div>
																	 <div class="col-sm-3 col-xs-5">
																	 
                                                                              <?php $getarrayallstates = \common\models\Bellscountryconfig::find()->where(['isactive'=>1])->groupBy('state')->all();$temp = 0;
		                                                                      $catList = ArrayHelper::map($getarrayallstates,'state','state');
																			 ?> <?php echo $form->field($model, 'selectcatcorresp')->dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorresp'])->label(false); ?>
																	 
																	  </div>
																	 
																	 <div class="col-sm-3 col-xs-5">
																			<?php $getarrayallcity = \common\models\Bellscountryconfig::find()->where(['isactive'=>1])->groupBy('state')->all();$temp = 0;
		                                                                      $catList = ArrayHelper::map($getarrayallcity,'city','city');
																			 ?>
																			 <?php echo $form->field($model, 'selectprodcorresp')->widget(DepDrop::classname(), [
                                                                                    'options'=>['id'=>'subcat-id','name'=>'selectprodcorr','placeholder'=>'Select...'],
																					'data'=>[$catList],
                                                                                         'pluginOptions'=>[
                                                                                          'depends'=>['cat-id'],
																						  
                                                                                         // 'placeholder'=>'Select...',
                                                                                     'url'=>Url::to(['/site/subcat'])
                                                                                    ]
                                                                                   ])->label(false);
                                                                                            ?>
																			
																		</div>
																		<div class="col-sm-2 col-xs-5">
																			<?= $form->field($model, 'pincodecorr')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Pincode','name'=>'pincodecorr'])->label(false); ?>
                                                   
																		</div>
																		<div class="col-sm-11 col-xs-5"><br/>
																		<?= $form->field($model, 'corressaddress')->textarea(['class'=>'form-control','placeholder'=>"Enter Address ,street address or landmark.." ,'rows'=>"3",'name'=>'corressaddress'])->label(false); ?>
                                                   
															</div>
																	</div>
																</form>
																</div>
															</div>
															
                                                                </div>
															   </div>
																	 

                                                                <div class="form-group">
                                                                <div class="note note-info note_sam"> <label class="control-label">Permanent address<font color="red">*</font>&nbsp;&nbsp;&nbsp;<i><b><input type="checkbox" id="checkaddr" name="checkaddr" onclick="FillBilling(this.form)" > Same as above</b></i></label></div>
                                                              <div class="input_fields_wrap2">
                                                            <div class="row">
																<div class="col-md-12" style="padding:8px 0 20px 0;">
																	
																<div class="col-md-12">
<!--																	<div class="col-md-1 butn_ad col-xs-1">
																	<button class="add_field_button2"><i class="fa fa-plus"></i></button> 
																	</div>-->
																	<div class="col-sm-3 col-xs-5">
																	<?= $form->field($model, 'countrynewIdperman')->dropDownList(['india' => 'India'],['class'=>"form-control countries"])->label(false); ?>
															
																			
																	</div>
																	 <div class="col-sm-3 col-xs-5">
																	 
                                                                              <?php $getarrayallstates = \common\models\Bellscountryconfig::find()->where(['isactive'=>1])->groupBy('state')->all();$temp = 0;
		                                                                      $catList = ArrayHelper::map($getarrayallstates,'state','state');
																			 ?> <?php echo $form->field($model, 'selectcatperman')->dropDownList($catList, ['id'=>'cat-id2','prompt'=>'Select..','name'=>'selectcatperman'])->label(false); ?>
																	 
																	  </div>
																	 
																	 <div class="col-sm-3 col-xs-5">
																			<?php $getarrayallcity = \common\models\Bellscountryconfig::find()->where(['isactive'=>1])->groupBy('state')->all();$temp = 0;
		                                                                      $catList = ArrayHelper::map($getarrayallcity,'city','city');
																			 ?>
																			 <?php echo $form->field($model, 'selectprodperman')->widget(DepDrop::classname(), [
                                                                                    'options'=>['id'=>'subcat-id2','name'=>'selectprodperman','placeholder'=>'Select...'],
																					'data'=>[$catList],
                                                                                         'pluginOptions'=>[
                                                                                          'depends'=>['cat-id2'],
																						
                                                                                        
                                                                                     'url'=>Url::to(['/site/subcattwo'])
                                                                                    ]
                                                                                   ])->label(false);
                                                                                            ?>
																			
																		</div>
																		<div class="col-sm-2 col-xs-5">
																			<?= $form->field($model, 'pincodeperman')->textInput(['type' => 'text','class'=>'form-control','placeholder'=>'Pincode','name'=>'pincodeperman'])->label(false); ?>
                                                   
																		</div>
																		<div class="col-sm-11 col-xs-5"><br/>
																		<?= $form->field($model, 'permanaddress')->textarea(['class'=>'form-control','placeholder'=>"Enter Address ,street address or landmark.." ,'rows'=>"3",'name'=>'permanaddress'])->label(false); ?>
                                                   
															</div>
																	</div>
																
																</div>
															</div>
															
                                                                </div>
															   </div>
                                                            
                                                           <script>
														   function FillBilling(f) { 
														  
																	 if(f.checkaddr.checked == true) {
																		 
                                                                           f.selectcatperman.value =f.selectcatcorr.value;
                                                                      f.selectprodperman.value = f.selectprodcorr.value;
																	 f.pincodeperman.value = f.pincodecorr.value;
																	  f.permanaddress.value =f.corressaddress.value;
														   }}
																						   </script>
                                                           
                                                       
																<div class="margiv-top-4">
											
															<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
                                                              <a style="display:none;" href="<?php echo yii::$app->urlManager->createUrl(['common/documents']) ?>" class="btn btn-info"><i class="fa fa-share"></i> Next</a>
                                                            
                                                                <div align="right"><font color="red"><i>* Mandatory Fields</i></font></div>
                                                            </div>
                                                          
                                                       
														  <?php ActiveForm::end(); ?>
                                                   
                                                    <!-- END PERSONAL INFO TAB -->
                                                   
                                                 
                                                    <!-- END CHANGE PASSWORD TAB -->
                                                    <!-- PRIVACY SETTINGS TAB -->
												
											
												
												<script>
													  function focaldiv(){
													  var foc=$('#myprofile_isminor').val();
													  if(foc=='Yes'){
													  document.getElementById('divo1').style.display='block';
													  document.getElementById('divo2').style.display='block';
													  
													 document.getElementById('minorrelation').style.display='block';
													  document.getElementById('guardianname').style.display='block';
													   
													   
													  }
													  else {
													  document.getElementById('divo1').style.display='none';
													  document.getElementById('divo2').style.display='none';
													   
													 document.getElementById('minorrelation').style.display='none';
													  document.getElementById('guardianname').style.display='none';
														 
													 
													  }
														  
														
														  
														  
													  }
	                                          function focalnation(){
												    var foc=$('#nationality').val();
													  if(foc !='indian'){
													  document.getElementById('divo4').style.display='block';
													  document.getElementById('divo5').style.display='block';
													  
													  
													  }
													  else {
													  document.getElementById('divo4').style.display='none';
													  document.getElementById('divo5').style.display='none';
													   
													  
													 
													  }
												  
											  }
												</script>
          
                                                    
                                              
                   	 <!-- end MTPROFILE status section -->
          
						    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
						   
														

<script>
  $('.input_fields_wrap1').on('keyup', '.phone_no', function () {
    var $input = $(this),
        value = $input.val(),
        length = value.length,
        inputCharacter = parseInt(value.slice(-1));

    if (!((length > 1 && inputCharacter >= 0 && inputCharacter <= 9) || (length === 1 && inputCharacter >= 7 && inputCharacter <= 9))) {
        $input.val(value.substring(0, length - 1));
     }
  });
  function formatPhone(obj) {
    var numbers = obj.value.replace(/\D/g, ''),
        char = {0:'(',3:') ',6:' - '};
    obj.value = '';
    for (var i = 0; i < numbers.length; i++) {
        obj.value += (char[i]||'') + numbers[i];
    }
}
</script>
<script>
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}
</script>														
<script type="text/javascript" language="javascript">

 function onlyPanCardNo(tb) {
    var Number = /^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/;
    if (!(tb.value.match(Number))&&tb.value.trim()!='') {
		alert('please enter valid Pancard no');
       
       // toastr.warning("Correct format for PanCard is 5 characters followed by 4 numeric values followed by 1 character","");
        return false;
    }
}

</script>														
<script >
function onlyBullu(tb) {
    var returnValue = '';
    if(tb.value.includes(' '))
        tb.value=tb.value.replace(/\s/g, '');
	 if (!(isNaN(tb.value))) {
    if (tb.value.length == 12) {
        returnValue += tb.value.substr(0, 4) + ' ' + tb.value.substr(4, 4) + ' ' + tb.value.substr(8, 4);
        var Number = /^\d{4}\s\d{4}\s\d{4}$/;
		 tb.value = returnValue;
        if (!(tb.value.match(Number)) && tb.value.trim() != '') {
           // tb.focus();
            //toastr.warning("Correct format for PanCard is 5 characters followed by 4 numeric values followed by 1 character", "");
            return false;
        }
    }
    
	 } 
   
}

</script>							
<script>

$(document).ready(function() {
	
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row adress_rw"> <div class="col-md-12"><input type="checkbox" name="chkir2[]"  id="chkir2" value="1" style="display:none;"><div class="col-md-1"></div><div class="col-md-5"><select class="form-control" id="emailtype[]" name="emailtype[]"><option value="Select">Select</option><option value="Work">Work</option><option value="Home">Home</option><option value="Other">Other</option><option value="Custom">Custom</option></select></div><div class="col-md-5"><input type="text" class="form-control" onblur="validateEmail(this);" /></div> <div class="col-md-1"> <button href="#" class="remove_field"><i class="fa fa-trash-o"></i></button></div></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })
});

</script>

<script>

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap1"); //Fields wrapper
    var add_button      = $(".add_field_button1"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
		
            x++; //text box increment
			var y = x-1;
            $(wrapper).append('<div class="row remov_row"><div class="col-md-12"><input class="form-control" type="checkbox" name="chkir[]" id="chkir" value="1" style="display:none;"> <div class="col-md-1 text-center butn_ad"></div><div class="col-md-5"><select class="form-control" id="phonetype[]" name="phonetype[]"><option value="Select">Select</option><option value="Mobile">Mobile</option><option value="Work">Work</option><option value="Home">Home</option><option value="Other">Other</option></select></div> <div class="col-md-5"><input class="form-control phone_no" maxlength="10" onblur="formatPhone(this);" type="text" />	</div><div class="col-md-1 hid_field butn_ad text-center"> <button href="#" class="remove_field1"><i class="fa fa-trash-o "></i></button></div></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field1", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })
});

</script>

	<script>
$(document).ready(function () {    
    var allOptions = $('#selectprod option')
    $('#selectcat').change(function () {
	//	alert('#');
        $('#selectprod option').remove()
        var classN = $('#selectcat option:selected').prop('class');
        var opts = allOptions.filter('.' + classN);
        $.each(opts, function (i, j) {
            $(j).appendTo('#selectprod');
        });
    });
});


</script>	   
						   
<script>
$(document).ready(function () {    
    var allOptions = $('#selectprodcorr option')
    $('#selectcatcorr').change(function () {
	//	alert('#');
        $('#selectprodcorr option').remove()
        var classN = $('#selectcatcorr option:selected').prop('class');
        var opts = allOptions.filter('.' + classN);
        $.each(opts, function (i, j) {
            $(j).appendTo('#selectprodcorr');
        });
    });
});


</script>	

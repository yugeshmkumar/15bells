<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\bootstrap\Modal;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
//use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
$this->title = 'My Profile';
$userid = Yii::$app->user->identity->id;
$user = \common\models\User::find()->where(['id' => $userid])->one();
$userprofile = \common\models\UserProfile::find()->where(['user_id' => $userid])->one();
$userprofileex = \common\models\UserProfileEx::find()->where(['user_id' => $userid])->one();
$myprofile = \common\models\Myprofile::find()->where(['userID' => $userid])->one();
//print_r($myprofile);die;
CrudAsset::register($this);

?>

<!-- start breadcrumb -->



<?php
Modal::begin([
"id" => "ajaxCrudModal",
"footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>

<!-- start Upper section -->
<br/>
<?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
$count = $getprofilestatus->process_status;
} else {
$count = 0;
}

$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
if ($getprofilestatus1) {
$count1 = $getprofilestatus1->process_status;
} else {
$count1 = 0;
}
?>
<style>
.modal{display:none;}
</style>
<div class="container">
    <div class="col-md-12">
        <div class="portlet light portlet-fit trans_prnt">

            <div class="portlet-body">
                
                <!-- end  upper section -->
                <!-- start MTPROFILE -->
                <div class="row">
					
                    <div class="col-md-10" style="padding:0;">
                        <div class="portlet light port_let" style="background: transparent !important;">
                            <div class="portlet-title tabbable-line tab_brdr">
                                

                            </div>

                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_2">


                                        <div class="form-group" style="position:relative;">

                                            <?php
                                            Modal::begin([
                                            "id" => "ajaxCrudModal",
                                            "footer" => "", // always need it for jquery plugin
                                            ])
                                            ?>
                                            <?php Modal::end(); ?>

                                        </div>


                                        <?php
                                        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'method' => 'post']]);
                                        ?>
								
									<div class="col-md-12 user_particular margin_prof">	
												<div class="row">


													<div class="col-md-4">
														<div class="text-center">
                                                       
                                                            <?php if ($myprofile) { ?>
                                                                <?php if ($myprofile->logo) { ?>
															<p><img src="<?php echo Yii::getAlias('@archiveUrl'); ?>/mycompanylogo/<?php echo $myprofile->logo ?>" id="thumbnail" class="small_prof"></p>
                                                            <?php }else{ ?>
                                                                <p><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+picture" id="thumbnail" class="small_prof"></p>
                                                            <?php } ?>
                                                            <?php }else{ ?>
                                                                <p><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+picture" id="thumbnail" class="small_prof"></p>
                                                            <?php } ?>
                                                        </div>
													

                                                  
                                                    <span class="btn-file span_logo">
                                                        <span class="fileinput-new">  </span>

                                                        <label class="fileContainer"> 
                                                            <i class="fa fa-edit"></i> Edit Profile Picture
                                                            <input type="file" name="logo" id="logo" >
                                                        </label>
                                                    </span>
                                                    </div>



                                                    <?php  if($user) {  ?>
													<div class="col-md-4">
															<p class="user_det"><?php echo  ucfirst($user->fullname).' '.ucfirst($user->lastname)  ?></p>
                                                            <?php
									$company = \common\models\Company::find()->where(['userid' => Yii::$app->user->identity->id])->one();
									
									if($company){ ?>
                                    <p class="user_det"><?php echo  ucfirst($company->company_type).' '.ucfirst($company->name)  ?></p>
                                    <?php }  else { ?>
															<p class="user_det">Position, Comapny Name</p>

                                    <?php } ?>
															<p class="user_det"><?php echo  ucfirst($user->username)  ?></p>
														
													</div>
													<div class="col-md-4">
															<p class="user_det"><?php echo  ucfirst($user->email)  ?></p>

															<?php if($myprofile){ ?>

											<p class="user_det"><?php echo  ucfirst($myprofile->current_city).' , '.ucfirst($myprofile->current_state)  ?></p>
									<?php	} else{  ?>
										<p class="user_det"> City , State</p>
									<?php } ?>
														
													</div>
                                                    <?php 	 }   ?>
												</div> 
											</div>
                                        <!-- PERSONAL INFO TAB -->
                                     <div class="tab-pane active tab_new" id="tab_1_1">
                                        
                                          <form role="form" action="#">
											
                                              <div class="col-md-12 tab user_particular">	
												<div class="note note-info note_sam"> <span class="exp_name">User Particulars</span> </div>
                                                    <div class="row">

                                                        <div class="col-md-4  col-sm-4">
                                                            <div class="form-group">
                                                               
                                                               <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->title) {
                                                                $model->title = $myprofile->title;
                                                                }
                                                                }
                                                                ?>
                                                                <?=  $form->field($model, 'title')->dropDownList(['Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ],['prompt'=>'Select Title *','class' => 'one_inpt form-control'])->label(false); ?>
                                                                  
                                                            </div></div>


                                                        <div class="col-md-4  col-sm-4">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->first_name) {
                                                                $model->first_name = $myprofile->first_name;
                                                                ?>
                                                                <div style="display:none;"> <?= $form->field($model, 'first_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "First name*"])->label(false); ?> </div>
                                                                <?= $form->field($model, 'first_name')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder'=>"First Name*"])->label(false); ?>
                                                                <?php } else { ?>
                                                                <?= $form->field($model, 'first_name')->textInput(['placeholder'=>"First Name*",'class' => 'one_inpt form-control'])->label(false); ?>
                                                                <?php } ?> 
                                                                <?php } else { ?>
                                                                <?= $form->field($model, 'first_name')->textInput(['placeholder'=>"First Name*",'class' => 'one_inpt form-control'])->label(false); ?>
                                                                <?php }
                                                                ?>

                                                            </div></div>

                                                        <div class="col-md-4   col-sm-4" style="display:none;">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->middlename) {
                                                                $model->middlename = $myprofile->middlename;
                                                                ?>
                                                                <div style="display:none;"> <?= $form->field($model, 'middlename')->textInput(['class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?> </div>
                                                                <?= $form->field($model, 'middlename')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?>
                                                                <?php } else { ?>
                                                                <?= $form->field($model, 'middlename')->textInput(['class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?>
                                                                <?php } ?>
                                                                <?php } else { ?>
                                                                <?= $form->field($model, 'middlename')->textInput(['class' => 'one_inpt form-control','placeholder' => "Middle name"])->label(false); ?>
                                                                <?php }
                                                                ?>

                                                            </div> </div> <div class="col-md-4 col-sm-4">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->last_name) {
                                                                $model->last_name = $myprofile->last_name;
                                                                ?>
                                                                <div style="display:none;"> <?= $form->field($model, 'last_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?> </div>
                                                                <?= $form->field($model, 'last_name')->textInput(['disabled' => true,'class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?>
                                                                <?php } else { ?>
                                                                <?= $form->field($model, 'last_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?>
                                                                <?php } ?> 
                                                                <?php } else { ?>
                                                                <?= $form->field($model, 'last_name')->textInput(['class' => 'one_inpt form-control','placeholder' => "Last name*"])->label(false); ?>
                                                                <?php }
                                                                ?>

                                                            </div> </div>

                                                    </div>

                                                    <div class="row">

                                                         

                                                        <div class="col-md-4   col-sm-4">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->dob) {
                                                                $model->dob = $myprofile->dob;
                                                                ?>
                                                                <div style="display:none;"> <?= $form->field($model, 'dob')->textInput(['class' => 'one_inpt form-control'])->label(false); ?> </div>
                                                                <?= $form->field($model, 'dob')->textInput(['disabled' => true,'class' => 'one_inpt form-control mrgn_2'])->label(false); ?>
                                                                <?php } else { ?>
                                                                <?php
                                                                echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
                                                                'options' => ['placeholder' => 'Enter DOB*',
                                                                'id' => 'dob',
                                                                'format' => 'y-m-d',
                                                                'onChange' => 'checkvalidatn(this.value)','class' => 'one_inpt form-control mrgn_2'
                                                                ],
                                                                'pluginOptions' => [
                                                                'autoclose' => true
                                                                ]
                                                                ])->label(false);
                                                                ?>	<?php } ?> <?php } else { ?>
                                                                <?php
                                                                echo $form->field($model, 'dob')->widget(DatePicker::classname(), [
                                                                'options' => ['placeholder' => 'Enter DOB*',
                                                                //'name'=>'dob',
                                                                'id' => 'dob',
                                                                'format' => 'y-m-d',
                                                                'onChange' => 'checkvalidatn(this.value)',
																'class' => 'one_inpt form-control mrgn_2'
                                                                ],
                                                                'pluginOptions' => [
                                                                'autoclose' => true
                                                                ]
                                                                ])->label(false);
                                                                ?><?php } ?>


                                                            </div> </div>
                                                        <div class="col-md-4   col-sm-4" style="display:none;">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->martial_status) {
                                                                $model->martial_status = $myprofile->martial_status;
                                                                }
                                                                }
                                                                ?>
                                                                <?= $form->field($model, 'martial_status')->dropDownList(['Married' => 'Married', 'Un-Married' => 'Single'], ['prompt' => 'Select Marital status*','class' => 'one_inpt form-control'])->label(false) ?> 
                                                            </div> 
                                                        </div>
 																			<div class="col-md-4  col-sm-4">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->nationality) {
                                                                $model->nationality = $myprofile->nationality;
                                                                }
                                                                }
                                                                ?>
                                                                <?= $form->field($model, 'nationality')->dropDownList(['indiancitizen' => 'Indian', 'NRI' => 'NRI', 'OCI' => 'OCI', 'PIO' => 'PIO'], ['prompt' => 'Select Nationality*', 'onChange' => "focalnation()", 'id' => 'nationality','class' => 'one_inpt form-control'])->label(false) ?> 
                                                            </div> 
                                                        </div>





                                                    </div>
                                                    <div class="row">
																			 <div class="col-md-4  col-sm-4">
                                                            <div class="form-group">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->gender) {
                                                                $model->gender = $myprofile->gender;
                                                                ?>
                                                                <div style="display:none;"> <?= $form->field($model, 'gender')->textInput(['class' => 'one_inpt form-control'])->label(false); ?> </div>
                                                                                                
                                                                <?= $form->field($model, 'gender')->textInput(['prompt' => 'Select Gender*','disabled' => true,'class' => 'one_inpt form-control'])->label(false); ?>
                                                                <?php } else { ?>
                                                                 <div style="display:none;">
                                                                <?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female'], ['prompt' => 'Select Gender*','class' => 'one_inpt form-control'])->label(false); ?>
                                                               </div>
                                                                <?php } ?> <?php } else { ?>
                                                                 <div style="display:none;">
                                                                <?= $form->field($model, 'gender')->dropDownList(['Male' => 'Male', 'Female' => 'Female'], ['prompt' => 'Select Gender*','class' => 'one_inpt form-control'])->label(false); ?>
                                                                </div>
                                                                <?php } ?></div></div>
                                                     
                                                        <div class="col-md-4   col-sm-4" style="display:none;">
                                                            <div class="form-group" style="display:none;">

                                                                <?php
                                                                if ($myprofile) {

                                                                if ($myprofile->isMinor) {
                                                                ?>

                                                                <?php } ?>	  <?php } ?>	  
                                                                <select id="isMinor" class="form-control one_inpt" value = "No" onChange="focaldiv()" name="isMinor">
                                                                    <option value="No">No</option>
                                                                    <option value="Yes">Yes</option>
                                                                </select>								

                                                            </div>
                                                        </div>
                                                        <?php
                                                        if ($myprofile) {
                                                        if ($myprofile->countryverificatn) {
                                                        $model->countryverificatn = $myprofile->countryverificatn;
                                                        }
                                                        }
														
                                                        ?>
														
                                                   <div class="col-md-8" id="nationalityhide" <?php if ($myprofile) { if($myprofile->hide == '1'){ ?>style="display:none;<?php } } ?>">
														<div class="row">
                                                        <div class="col-md-6   col-sm-4">
															<div class="row">
                                                    <?php	 if ($myprofile) {
                                                    
                                                    if ($myprofile->countryverificatn !='') {  ?>
													                
                                                            <div id="divo6" class="col-md-12" style="display:none;">
                                                                <div class="form-group">


                                                                    <?= $form->field($model, 'countryverificatn')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Country Identification Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                </div>
                                                                <?php   } } else{ ?>
                                                                    <div style="display:none;">
                                                            <div id="divo6" class="col-md-12" style="display:none;">
                                                                <div class="form-group">


                                                                    <?= $form->field($model, 'countryverificatn')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Country Identification Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div>
                                                                </div> </div>
                                                                
                                                                <?php } ?> 
                                                                
                                                           <?php	
                                                           if ($myprofile) {
                                                           
                                                           if ($myprofile->ocinumber !='') {  ?>
													               
                                                            <div id="divo8" class="col-md-12" style="display:none;">
                                                                <div class="form-group"></font></label>


                                                                    <?= $form->field($model, 'ocinumber')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'OCI Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                
                                                                <?php }  }else{ ?>
                                                                    <div style="display:none;">
                                                            <div id="divo8" class="col-md-12" style="display:none;">
                                                                <div class="form-group"></font></label>


                                                                    <?= $form->field($model, 'ocinumber')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'OCI Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                </div>
                                                                <?php } ?>
                                                                
                                                             <?php
                                                             if ($myprofile) {
                                                             if ($myprofile->pionumber !='') {  ?>
													                   
                                                            <div id="divo9" class="col-md-12" style="display:none;">
                                                                <div class="form-group">


                                                                    <?= $form->field($model, 'pionumber')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'PIO Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                
                                                                <?php }  }else{ ?>
                                                                
                                                                    <div style="display:none;"> 
                                                            <div id="divo9" class="col-md-12" style="display:none;">
                                                                <div class="form-group">


                                                                    <?= $form->field($model, 'pionumber')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'PIO Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                               </div>
                                                                <?php  } ?>
                                                                
                                                            <?php	
                                                            if ($myprofile) {
                                                            if ($myprofile->pan_card_no !='') {  ?>
													                    
                                                            <div id="divo7" class="col-md-12" style="display:none;">
                                                                <div class="form-group">
                                                                    <?php
                                                                    if ($myprofile) {
                                                                    if ($myprofile->pan_card_no) {
                                                                    $model->pan_card_no = $myprofile->pan_card_no;
                                                                    }
                                                                    }
                                                                    ?>

                                                                    <?= $form->field($model, 'pan_card_no')->textInput(['type' => 'text','class' => 'one_inpt form-control', 'placeholder' => 'PAN Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                 
                                                                <?php }  }else{ ?>

                                                                  <div style="display:none;">    
                                                            <div id="divo7" class="col-md-12" style="display:none;">
                                                                <div class="form-group">
                                                                    <?php
                                                                    if ($myprofile) {
                                                                    if ($myprofile->pan_card_no) {
                                                                    $model->pan_card_no = $myprofile->pan_card_no;
                                                                    }
                                                                    }
                                                                    ?>

                                                                    <?= $form->field($model, 'pan_card_no')->textInput(['type' => 'text','class' => 'one_inpt form-control', 'placeholder' => 'PAN Card*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                 </div>
                                                                 <?php } ?>                                                                
                                                                
																</div>
                                                        </div>
                                                        <?php
                                                        if ($myprofile) {
                                                        if ($myprofile->adhar_card_no) {
                                                        $model->adhar_card_no = $myprofile->adhar_card_no;
                                                        }
                                                        }
                                                        ?>
                                                        <div class="col-md-6   col-sm-4 col-xs-12">
															<div class="row">
															
                                                            <?php	
                                                            if ($myprofile) {
                                                            if ($myprofile->adhar_card_no !='') {  ?>
													                
                                                            <div class="col-md-12" id="divo4" style="display:none;">
                                                                <div class="form-group">

                                                                    <?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'Aadhar Card*'])->label(false); ?>

                                                                </div></div>
                                                               
                                                                <?php }  }else{ ?>
                                                                
                                                                    <div style="display:none;">
                                                            <div class="col-md-12" id="divo4" style="display:none;">
                                                                <div class="form-group">

                                                                    <?= $form->field($model, 'adhar_card_no')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'Aadhar Card*'])->label(false); ?>

                                                                </div></div>
                                                                </div>
                                                                <?php } ?>
                                                                
                                                                
                                                                
                                                            <?php	
                                                            if ($myprofile) {
                                                            
                                                            if ($myprofile->passportno !='') {  ?>
													                  
                                                            <div class="col-md-12" id="divo5" style="display:none;">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->passportno) {
                                                                $model->passportno = $myprofile->passportno;
                                                                }
                                                                }
                                                                ?>
                                                                <div class="form-group">

                                                                    <?= $form->field($model, 'passportno')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'Passport Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                                
                                                                <?php }  }else{ ?>
                                                                    <div style="display:none;">  
                                                            <div class="col-md-12" id="divo5" style="display:none;">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->passportno) {
                                                                $model->passportno = $myprofile->passportno;
                                                                }
                                                                }
                                                                ?>
                                                                <div class="form-group">

                                                                    <?= $form->field($model, 'passportno')->textInput(['type' => 'text', 'class' => 'one_inpt form-control', 'placeholder' => 'Passport Number*', 'onkeyup' => "javascript:capitalize(this.id, this.value);"])->label(false); ?>

                                                                </div></div>
                                                               </div>
                                                                <?php } ?>
                                                                
                                                                
															</div>
                                                        </div>
														</div>
                                                    </div>
                                                </div>
                                             </div>
								
                                                <div class="row tab user_particular">
                                                    <div class="col-md-12" style="padding:0px !important;">
                                                        <div class="form-group" style="position:relative;">
                                                            <div class="note note-info" style="">  <label class="control-label note_sam">
                                                                    <span class="exp_name"> Contact Number</span></label></div>
                                                            <!-- --> 
                                                            <div class="input_fields_wrap1 row">
                                                                <?php
                                                                $primarynotype = \common\models\UserPhoneconfig::find()->where(['userid' => Yii::$app->user->identity->id, 'isdefault' => 1])->one();
                                                                if ($primarynotype) {

                                                                $primarytype = \common\models\Phonenumbers::find()->where(['id' => $primarynotype->phoneid])->one();
                                                                if ($primarytype) {

                                                                // exit();
                                                                $model->phonetypeprimary = $primarytype->phonetype;
                                                                if ($primarytype->country_code) {

                                                                $model->phonecodetypeprim = $primarytype->country_code;
                                                                } else {

                                                                $model->phonecodetypeprim = Yii::$app->user->identity->countrycode;
                                                                }
                                                                if ($primarytype->phone_no) {
                                                                $model->phonenumbersprim = $primarytype->phone_no;
                                                                } else {
                                                                $model->phonenumbersprim = Yii::$app->user->identity->username;
                                                                }
                                                                }
                                                                } else {
                                                                if (!empty($model->phonecodetypeprim)) {

                                                                $model->phonecodetypeprim = Yii::$app->user->identity->countrycode;
                                                                } else {

                                                                $model->phonecodetypeprim = Yii::$app->user->identity->countrycode;
                                                                }
                                                                $model->phonenumbersprim = Yii::$app->user->identity->username;
                                                                }
                                                                ?>

                                                                <div class="col-md-4   col-sm-4">
                                                                    <?= $form->field($model, 'phonetypeprimary')->dropDownList(['Mobile' => 'Primary Number', 'Work' => 'Work', 'Home' => 'Home', 'Other' => 'Other'], ['prompt' => 'Primary No.*', 'class' => 'one_inpt form-control'])->label(false); ?>


                                                                </div>
                                                                <div class="col-md-4  col-sm-4 padding_cont">

                                                                    <?php
                                                                    $arrfindallcountriescode = \common\models\Countries::find()->all();
                                                                    $findallcountriescode = ArrayHelper::map($arrfindallcountriescode, 'phonecode', 'phonecode');
                                                                    ?>
                                                                    <?php
                                                                    echo $form->field($model, 'phonecodetypeprim')->widget(Select2::classname(), [
                                                                    'data' => $findallcountriescode,
                                                                    'options' => ['placeholder' => 'Select Country Code...','class' => 'one_inpt form-control'],
                                                                    'pluginOptions' => [
                                                                    'placeholder' => 'Select Country Code...',
                                                                    'allowClear' => true],
                                                                    ])->label(false);
                                                                    ?>

                                                                    <!--<span class="help-block"> (999) 999-9999 </span>-->
                                                                </div>
                                                                <div class="col-md-4   col-sm-4">

                                                                    <?= $form->field($model, 'phonenumbersprim')->textInput(['class' => 'form-control one_inpt phone_no','placeholder' => "Primary Number"])->label(false); ?>


                                                                    <!--<span class="help-block"> (999) 999-9999 </span>-->
                                                                </div></div>
                                                            <?php
                                                            $secondnotype = \common\models\UserPhoneconfig::find()->where('userid =:userid and isdefault != :config', array(':userid' => Yii::$app->user->identity->id, 'config' => 1))->one();
                                                            if ($secondnotype) {

                                                            $secondtype = \common\models\Phonenumbers::find()->where(['id' => $secondnotype->phoneid])->one();
                                                            if ($secondtype) {

                                                            // exit();
                                                            $model->phonetypesecondary = $secondtype->phonetype;
                                                            $model->phonecodetypecorres = $secondtype->country_code;
                                                            $model->phonenumbersecondary = $secondtype->phone_no;
                                                            }
                                                            } else {
                                                            $model->phonecodetypecorres = '91';
                                                            }
                                                            ?>
                                                        
                                                            
                                                            
                                                            </div>
                                                    </div>
                                               
                                                    <div class="col-md-12" style="padding:0px !important;">
                                                        <div class="form-group" style="position:relative;">
                                                            <div class="note note-info note_sam tool_tip">  <label class="control-label lbl_pos note_sam">
                                                                  <span class="exp_name">Contact E-mail</span></label></div>
                                                            <!-- -->
                                                            <div class="input_fields_wrap1 row">
                                                                <?php
                                                                $primemailtype = \common\models\UserEmailconfig::find()->where('userid =:userid and isdefault = :config', array(':userid' => Yii::$app->user->identity->id, 'config' => 1))->one();
                                                                if ($primemailtype) {

                                                                $primmyemailtype = \common\models\Emailaddresses::find()->where(['id' => $primemailtype->emailid])->one();
                                                                if ($primmyemailtype) {

                                                                // exit();
                                                                $model->emailtypeprimary = $primmyemailtype->emailtype;
                                                                $model->emailnumbersprim = $primmyemailtype->emailaddress;
                                                                }
                                                                } else {
                                                                $model->emailnumbersprim = Yii::$app->user->identity->email;
                                                                }
                                                                $secondemailtype = \common\models\UserEmailconfig::find()->where('userid =:userid and isdefault != :config', array(':userid' => Yii::$app->user->identity->id, 'config' => 1))->one();
                                                                if ($secondemailtype) {

                                                                $secondmyemailtype = \common\models\Emailaddresses::find()->where(['id' => $secondemailtype->emailid])->one();
                                                                if ($secondmyemailtype) {

                                                                // exit();
                                                                $model->emailtypesecondary = $secondmyemailtype->emailtype;
                                                                $model->emailnumbersecondary = $secondmyemailtype->emailaddress;
                                                                }
                                                                }
                                                                ?>

                                                                <div class="col-md-6 col-xs-12 col-sm-6">
                                                                    <?= $form->field($model, 'emailtypeprimary')->dropDownList(['Work' => 'Primary Email', 'Home' => 'Home', 'Other' => 'Other'], ['prompt' => 'Primary Email*', 'class' => "form-control one_inpt"])->label(false); ?>


                                                                </div>

                                                                <div class="col-md-6 col-xs-12 col-sm-6">
                                                                    <?= $form->field($model, 'emailnumbersprim')->textInput(['type' => 'email', 'class' => 'form-control one_inpt','placeholder' => "Primary E-mail"])->label(false); ?>

                                                                    <!--<span class="help-block"> (999) 999-9999 </span>-->
                                                                </div></div>

                                                            

                                                        </div>
                                                    </div>
                                                </div>
												
									
                                                <div class="row tab user_particular">
                                                    <div class="col-md-12">
                                                        <div class="note note-info note_sam currnt_ad colr_bg"> <label class="control-label note_sam">
                                                                    <span class="exp_name"> Current Address</span></label></div>
                                                    </div>
                                                    <div class="input_fields_wrap2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?php
                                                                if ($myprofile) {
                                                                if ($myprofile->current_address) {
                                                                $model->current_address = $myprofile->current_address;
                                                                }
                                                                if ($myprofile->current_state) {
                                                                $model->current_state = $myprofile->current_state;
                                                                }
                                                                if ($myprofile->current_country) {
                                                                $model->current_country = $myprofile->current_country;
                                                                }
                                                                if ($myprofile->current_city) {
                                                                $model->current_city = $myprofile->current_city;
                                                                }
                                                                if ($myprofile->current_pincode) {
                                                                $model->current_pincode = $myprofile->current_pincode;
                                                                }
                                                                } else {
                                                                $model->current_country = 'India';
                                                                }
                                                                ?>
                                                                <div class="col-md-12">
																	<div class="row">
                                                                    <!--																	<div class="col-md-1 butn_ad col-xs-1">
                                                                                                                                                                                                        <button class="add_field_button2"><i class="fa fa-plus"></i></button> 
                                                                                                                                                                                                        </div>-->
                                                                    <div class="col-sm-11 col-xs-12">

                                                                        <?= $form->field($model, 'current_address')->textarea(['class' => 'form-control one_inpt', 'placeholder' => "Enter Address ,street address or landmark*", 'rows' => "3", 'id' => 'current_address'])->label(false); ?>

                                                                    </div><br/>
                                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                                        <?php
                                                                        $arrfindallcountries = \common\models\activemode::findallcountries();
                                                                        $arrcountrylist = ArrayHelper::map($arrfindallcountries, 'name', 'name');
                                                                        ?>

                                                                        <?php
                                                                        echo $form->field($model, 'current_country')->widget(Select2::classname(), [
                                                                        'data' => $arrcountrylist,
                                                                        'options' => ['placeholder' => 'Select country*', 'id' => 'current_country','class' => "form-control one_inpt"],
                                                                        'pluginOptions' => [
                                                                        'allowClear' => true
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        ?>

                                                                    </div>
                                                                    <div class="col-sm-3 col-xs-12 addres padding_cont">
                                                                        <?php
                                                                        if ($myprofile) {
                                                                        $model->current_state = $myprofile->current_state;
                                                                        $findcountry = \common\models\Countries::find()->where(['name' => $model->current_country])->one();
                                                                        $arrfindstates = \common\models\States::find()->where(['country_id' => $findcountry->id])->all();
                                                                        $liststate = ArrayHelper::map($arrfindstates, 'name', 'name');
                                                                        echo $form->field($model, 'current_state')->widget(DepDrop::classname(), [
                                                                        'data' => $liststate,
                                                                        'type' => DepDrop::TYPE_SELECT2,
                                                                        'options' => ['id' => 'current_state', 'placeholder' => 'Select State*'],
                                                                        'pluginOptions' => [
                                                                        'placeholder' => 'Select State*',
                                                                        'allowClear' => true,
                                                                        'depends' => ['current_country'],
                                                                        'url' => Url::to(['/site/subcatparent']),
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        } else {
                                                                        ?>
                                                                        <?php $arrfindstatesp = \common\models\States::find()->where(['country_id' => 101])->all();
                                                                        $liststatex = ArrayHelper::map($arrfindstatesp, 'name', 'name');
                                                                        ?>
                                                                        <?php
                                                                        echo $form->field($model, 'current_state')->widget(DepDrop::classname(), [
                                                                        'data' => $liststatex,
                                                                        'type' => DepDrop::TYPE_SELECT2,
                                                                        'options' => ['id' => 'current_state', 'placeholder' => 'Select State*','class' => "form-control one_inpt"],
                                                                        'pluginOptions' => [
                                                                        'placeholder' => 'Select State*',
                                                                        'allowClear' => true,
                                                                        'depends' => ['current_country'],
                                                                        'url' => Url::to(['/site/subcatparent']),
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        ?>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <div class="col-sm-3 addres col-xs-12 padding_cont">
                                                                        <?php
                                                                        if ($myprofile) {
                                                                        $model->current_state = $myprofile->current_state;
                                                                        $findstates = \common\models\States::find()->where(['name' => $model->current_state])->one();
                                                                        $arrfindcities = \common\models\Cities::find()->where(['state_id' => $findstates->id])->all();
                                                                        $listcity = ArrayHelper::map($arrfindcities, 'name', 'name');
                                                                        ?>
                                                                        <?php
                                                                        echo $form->field($model, 'current_city')->widget(DepDrop::classname(), [
                                                                        'data' => $listcity,
                                                                        'type' => DepDrop::TYPE_SELECT2,
                                                                        //'data' => $catList,
                                                                        'options' => ['id' => 'current_city'],
                                                                        'pluginOptions' => [
                                                                        'placeholder' => 'Select City*',
                                                                        'depends' => ['current_state'],
                                                                        'url' => Url::to(['/site/subcat']),
                                                                        'allowClear' => true
                                                                        ],
                                                                        ])->label(false);
                                                                        ?>
                                                                        <?php } else { ?>
                                                                        <?php
                                                                        echo $form->field($model, 'current_city')->widget(DepDrop::classname(), [

                                                                        'type' => DepDrop::TYPE_SELECT2,
                                                                        //'data' => $catList,
                                                                        'options' => ['id' => 'current_city'],
                                                                        'pluginOptions' => [
                                                                        'placeholder' => 'Select City*',
                                                                        'depends' => ['current_state'],
                                                                        'url' => Url::to(['/site/subcat']),
                                                                        'allowClear' => true
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        }
                                                                        ?>


                                                                    </div>
                                                                    <div class="col-sm-2 col-xs-12 padding_cont">
                                                                        <?= $form->field($model, 'current_pincode')->textInput(['type' => 'text', 'class' => 'form-control one_inpt', 'placeholder' => 'Pincode', 'id' => 'current_pincode'])->label(false); ?>

                                                                    </div>

                                                                </div>
                                                                </form>
																</div>
                                                            </div>
                                                        </div>

                                                    </div>
													
                                                    <div class="col-md-12" style="padding:0px !important">
                                                        <div class="note note-info note_sam permnent_ad"> <label class="control-label lbl_pos note_sam"><span class="exp_name">Permanent address&nbsp;&nbsp;&nbsp;</span><i><b style="font-size:14px;"><input type="checkbox" id="checkaddr" name="checkaddr" onclick="FillBilling(this.form)" > Same as above</b></i></label></div>
                                                    </div>
                                                    <div class="input_fields_wrap2">
                                                        <div class="row" style="">
                                                            <div class="col-md-12">
                                                                <?php
                                                                if ($myprofile) {

                                                                if ($myprofile->permanent_state) {
                                                                $model->permanent_state = $myprofile->permanent_state;
                                                                }
                                                                if ($myprofile->permanent_country) {
                                                                $model->permanent_country = $myprofile->permanent_country;
                                                                }
                                                                if ($myprofile->permanent_city) {
                                                                $model->permanent_city = $myprofile->permanent_city;
                                                                }
                                                                if ($myprofile->permanent_pincode) {
                                                                $model->permanent_pincode = $myprofile->permanent_pincode;
                                                                }
                                                                } else {
                                                                $model->permanent_country = 'India';
                                                                }
                                                                ?>
                                                                <div class="row">

                                                                    <div class="col-sm-11 col-xs-12">
                                                                        <?php
                                                                        if ($myprofile) {
                                                                        if ($myprofile->permanent_address) {
                                                                        $model->permanent_address = $myprofile->permanent_address;
                                                                        ?>
                                                                        <?= $form->field($model, 'permanent_address')->textarea(['class' => 'form-control', 'placeholder' => "Enter Address ,street address or landmark*", 'rows' => "3", 'id' => 'permanent_address', 'disabled' => true])->label(false); ?> </div>
                                                                    <div style="display:none;"><?= $form->field($model, 'permanent_address')->textarea(['class' => 'form-control one_inpt', 'placeholder' => "Enter Address ,street address or landmark*", 'rows' => "3", 'id' => 'permanent_address', 'type' => 'hidden'])->label(false); ?>
                                                                    </div><?php }
                                                                    } else { ?>
                                                                    <?= $form->field($model, 'permanent_address')->textarea(['class' => 'form-control one_inpt', 'placeholder' => "Enter Address ,street address or landmark*", 'rows' => "3", 'id' => 'permanent_address'])->label(false); ?> </div>
                                                                <?php } ?>


                                                                <br/>
                                                                <div class="col-sm-3 col-xs-12  addres padding_cont">


                                                                    <?php
                                                                    $arrfindallcountriestwo = \common\models\activemode::findallcountries();
                                                                    $arrcountrylisttwo = ArrayHelper::map($arrfindallcountriestwo, 'name', 'name');
                                                                    ?>
                                                                    <?php
                                                                    if ($myprofile) {
                                                                    if ($myprofile->permanent_country) {
                                                                    $model->permanent_country = $myprofile->permanent_country;
                                                                    ?>
                                                                    <?= $form->field($model, 'permanent_country')->textInput(['id' => 'permanent_country', 'disabled' => true])->label(false); ?>
                                                                    <div style="display:none;"><?= $form->field($model, 'permanent_country')->textInput(['id' => 'permanent_country'])->label(false); ?>
                                                                    </div><?php }
                                                                    } else { ?>
                                                                    <div id="permancountry" style="display:block">
                                                                        <?php
                                                                        echo $form->field($model, 'permanent_country')->widget(Select2::classname(), [
                                                                        'data' => $arrcountrylisttwo,
                                                                        'options' => ['placeholder' => 'Select country...', 'id' => 'permanent_country'],
                                                                        'pluginOptions' => [
                                                                        'allowClear' => true
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        ?></div> 
                                                                    <div id="permancountrytwo" style="display:none"><?= $form->field($model, 'permanent_country')->textInput(['class' => 'form-control', 'id' => 'permanent_countrytwo', 'disabled' => true])->label(false); ?></div>
                                                                    <div style="display:none"><?= $form->field($model, 'permanent_country')->textInput(['id' => 'permanent_countrythree'])->label(false); ?></div>
                                                                    <?php } ?>

                                                                </div>
                                                                <div class="col-sm-3 col-xs-12  addres padding_cont">
                                                                    <?php
                                                                    if ($myprofile) {
                                                                    if ($myprofile->permanent_state) {
                                                                    $model->permanent_state = $myprofile->permanent_state;
                                                                    ?>
                                                                    <?= $form->field($model, 'permanent_state')->textInput(['id' => 'permanent_state', 'disabled' => true])->label(false); ?>
                                                                    <div style="display:none;"><?= $form->field($model, 'permanent_state')->textInput(['id' => 'permanent_state'])->label(false); ?>
                                                                    </div><?php }
                                                                    } else { ?>
                                                                    <?php $arrfindstatesp = \common\models\States::find()->where(['country_id' => 101])->all();
                                                                    $liststatex = ArrayHelper::map($arrfindstatesp, 'name', 'name');
                                                                    ?>
                                                                    <div id="permantwo" style="display:block">
                                                                        <?php
                                                                        echo $form->field($model, 'permanent_state')->widget(DepDrop::classname(), [
                                                                        'data' => $liststatex,
                                                                        'type' => DepDrop::TYPE_SELECT2,
                                                                        'options' => ['id' => 'permanent_state', 'placeholder' => 'Select State*'],
                                                                        'pluginOptions' => [
                                                                        'placeholder' => 'Select State*',
                                                                        'allowClear' => true,
                                                                        'depends' => ['permanent_country'],
                                                                        'url' => Url::to(['/site/subcatparent']),
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        ?></div>
                                                                    <div id="perman" style="display:none"><?= $form->field($model, 'permanent_state')->textInput(['class' => 'form-control', 'id' => 'permanent_statetwo', 'disabled' => true])->label(false); ?></div>
                                                                    <div style="display:none"><?= $form->field($model, 'permanent_state')->textInput(['id' => 'permanent_statethree'])->label(false); ?></div>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="col-sm-3 col-xs-12  addres padding_cont">
                                                                    <?php
                                                                    if ($myprofile) {
                                                                    if ($myprofile->permanent_city) {
                                                                    $model->permanent_city = $myprofile->permanent_city;
                                                                    ?>
                                                                    <?= $form->field($model, 'permanent_city')->textInput(['id' => 'permanent_city', 'disabled' => true])->label(false); ?>
                                                                    <div style="display:none;"><?= $form->field($model, 'permanent_city')->textInput(['id' => 'permanent_city'])->label(false); ?>
                                                                    </div> <?php }
                                                                    } else { ?>
                                                                    <div id="permancity" style="display:block">
                                                                        <?php
                                                                        echo $form->field($model, 'permanent_city')->widget(DepDrop::classname(), [
                                                                        'type' => DepDrop::TYPE_SELECT2,
                                                                        'options' => ['id' => 'permanent_city'],
                                                                        'pluginOptions' => [
                                                                        'placeholder' => 'Select City*',
                                                                        'depends' => ['permanent_state'],
                                                                        'url' => Url::to(['/site/subcat']),
                                                                        'allowClear' => true
                                                                        ],
                                                                        ])->label(false);
                                                                        //dropDownList($catList, ['id'=>'cat-id','prompt'=>'Select..','name'=>'selectcatcorr'])->label(false); 
                                                                        ?></div>
                                                                    <div id="permancitytwo" style="display:none"><?= $form->field($model, 'permanent_city')->textInput(['class' => 'form-control', 'id' => 'permanent_citytwo', 'disabled' => true])->label(false); ?></div>
                                                                    <div style="display:none"><?= $form->field($model, 'permanent_city')->textInput(['id' => 'permanent_citythree'])->label(false); ?></div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-sm-2 col-xs-12 padding_cont addres">
                                                                    <?php if ($myprofile) {
                                                                    if ($myprofile->permanent_pincode) {
                                                                    $model->permanent_pincode = $myprofile->permanent_pincode;
                                                                    ?>
                                                                    <?= $form->field($model, 'permanent_pincode')->textInput(['id' => 'permanent_pincode', 'disabled' => true])->label(false); ?>
                                                                    <div style="display:none;"><?= $form->field($model, 'permanent_pincode')->textInput(['id' => 'permanent_pincode','class'=>"form-control one_inpt"])->label(false); ?>
                                                                    </div><?php }
                                                                    } else { ?>

                                                                    <div id="permanent_pincode" style="display:block">
                                                                        <?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Pincode', 'id' => 'permanent_pincode'])->label(false); ?>
                                                                    </div>
                                                                    <div id="permanent_pincodetwo" style="display:none">
                                                                        <?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Pincode', 'id' => 'permanent_pincodetwo', 'disabled' => true])->label(false); ?>
                                                                    </div> 
                                                                    <div style="display:none;"><?= $form->field($model, 'permanent_pincode')->textInput(['type' => 'text', 'class' => 'form-control', 'placeholder' => 'Pincode', 'id' => 'permanent_pincodethree'])->label(false); ?></div>

                                                                    <?php } ?>
                                                                </div>

                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
											
                                        </div>
			<div style="overflow:auto;">
														<div style="">
														  <button class="left_butn butn_styl" type="button" id="prevBtn" onclick="nextPrev(-1)" style="float:left"><i class="fa fa-caret-left"></i> Previous</button>
														  <button class="right_butn butn_styl" type="button" id="nextBtn" onclick="nextPrev(1)" style="float:right;">Next <i class="fa fa-caret-right"></i></button>
														</div>
													  </div>
													  <!-- Circles which indicates the steps of the form: 
													  <div style="text-align:center;margin-top:40px;">
														<span class="step"></span>
														<span class="step"></span>
														<span class="step"></span>
														<span class="step"></span>
													  </div>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>								
						

		<script>
       document.getElementById("myprofile-phonetypeprimary").value= "Mobile";
       document.getElementById("myprofile-emailtypeprimary").value= "Work";
$(document).ready(function(){
	
		$("#myModal").modal('hide');
	
});
</script>								
										
										
                                        <script>


                                            function FillBilling(f) {


                                            if (f.checkaddr.checked == true) {

                                            var curreaddrchi = $('#current_address').val();
                                            var currestatchi = $('#current_state').val();
                                            var currecitychi = $('#current_city').val();
                                            var currepincchi = $('#current_pincode').val();
                                            var currecountrchi = $('#current_country').val();
                                            $('#current_address').keyup(function () {

                                            if (f.checkaddr.checked == true) {
                                            $('#permanent_address').val($('#current_address').val());
                                            }
                                            });
                                            $('#current_state').keyup(function () {
                                            $('#permanent_state').val(currestatchi);
                                            $('#permanent_statetwo').val(currestatchi);
                                            $('#permanent_statethree').val(currestatchi);
                                            });
                                            $('#current_city').keyup(function () {
                                            $('#permanent_city').val(currecitychi);
                                            $('#permanent_citytwo').val(currecitychi);
                                            $('#permanent_citythree').val(currecitychi);
                                            });
                                            $('#current_pincode').keyup(function () {
                                            $('#permanent_pincode').val(currepincchi);
                                            $('#permanent_pincodetwo').val(currepincchi);
                                            $('#permanent_pincodethree').val(currepincchi);
                                            });
                                            $('#current_country').keyup(function () {
                                            $('#permanent_country').val(currecountrchi);
                                            $('#permanent_countrytwo').val(currecountrchi);
                                            $('#permanent_countrythree').val(currecountrchi);
                                            });
                                            $('#permanent_address').val(curreaddrchi);
                                            $('#permanent_state').val(currestatchi);
                                            $('#permanent_statetwo').val(currestatchi);
                                            $('#permanent_statethree').val(currestatchi);
                                            $('#permanent_city').val(currecitychi);
                                            $('#permanent_citytwo').val(currecitychi);
                                            $('#permanent_citythree').val(currecitychi);
                                            $('#permanent_pincode').val(currepincchi);
                                            $('#permanent_pincodetwo').val(currepincchi);
                                            $('#permanent_pincodethree').val(currepincchi);
                                            $('#permanent_country').val(currecountrchi);
                                            $('#permanent_countrytwo').val(currecountrchi);
                                            $('#permanent_countrythree').val(currecountrchi);
                                            document.getElementById('perman').style.display = 'block';
                                            document.getElementById('permantwo').style.display = 'none';
                                            document.getElementById('permancitytwo').style.display = 'block';
                                            document.getElementById('permancity').style.display = 'none';
                                            document.getElementById('permancountrytwo').style.display = 'block';
                                            document.getElementById('permancountry').style.display = 'none';
                                            document.getElementById('permanent_pincodetwo').style.display = 'block';
                                            document.getElementById('permanent_pincode').style.display = 'none';
                                            //$('#permanent_address').prop('disabled', true);  
                                            $('#permanent_state').prop('disabled', true);
                                            $('#permanent_country').prop('disabled', true);
                                            $('#permanent_city').prop('disabled', true);
                                            $('#permanent_pincode').prop('disabled', true);
                                            } else {


                                            $('#permanent_state').prop('disabled', false);
                                            $('#permanent_country').prop('disabled', false);
                                            $('#permanent_city').prop('disabled', false);
                                            $('#permanent_pincode').prop('disabled', false);
                                            //$('#permanent_address').prop('disabled', false);  
                                            $('#permanent_statetwo').prop('disabled', true);
                                            $('#permanent_statethree').prop('disabled', true);
                                            $('#permanent_citytwo').prop('disabled', true);
                                            $('#permanent_citythree').prop('disabled', true);
                                            $('#permanent_pincodetwo').prop('disabled', true);
                                            $('#permanent_pincodethree').prop('disabled', true);
                                            $('#permanent_countrytwo').prop('disabled', true);
                                            $('#permanent_countrythree').prop('disabled', true);
                                            document.getElementById('permancountrytwo').style.display = 'none';
                                            document.getElementById('permancountry').style.display = 'block';
                                            document.getElementById('perman').style.display = 'none';
                                            document.getElementById('permantwo').style.display = 'block';
                                            document.getElementById('permancitytwo').style.display = 'none';
                                            document.getElementById('permancity').style.display = 'block';
                                            document.getElementById('permanent_pincodetwo').style.display = 'none';
                                            document.getElementById('permanent_pincode').style.display = 'block';
                                            }

                                            }
                                        </script>

                                        <div class="margiv-top-10">


                                            <?php echo Html::submitButton('Save & Upload Documents', ['class' => 'btn green btm_sbmt butn_styl', 'name' => 'savedatadocs', 'id' => 'savedatadocs','onclick' => "ga('send', 'event', 'Postlogin Myprofile Submit', 'Myprofile Submit', 'Myprofile Submit','Myprofile Submit')"]); ?>

                                            <a style="display:none;" href="<?php echo yii::$app->urlManager->createUrl(['common/documents']) ?>" class="btn btn-info butn_styl"><i class="fa fa-share"></i> Next</a>

                                        </div>

                                        </form>

                                    </div><?php ActiveForm::end(); ?></div>
                                <!-- END PERSONAL INFO TAB -->

                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->

                                <!-- END CHANGE PASSWORD TAB -->
                                <!-- PRIVACY SETTINGS TAB -->
                                

                                <script>

                                    function readURL(input) {
                                    $('#thumbnail').attr('');
                                    if (input.files && input.files[0]) {


                                    var reader = new FileReader();
                                    reader.onload = function (e) {

                                    $('#thumbnail').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                    }
                                    }

                                    $("#logo").change(function () {


                                    readURL(this);
                                    });
                                    function focaldiv() {
                                    var foc = $('#isMinor').val();
                                    if (foc == 'Yes') {

                                    $('a[href="<?php echo Yii::$app->urlManager->createUrl(['userguardiandetails / create']) ?>"]').click();
                                    document.getElementById('divo1').style.display = 'block';
                                    document.getElementById('divo2').style.display = 'block';
                                    document.getElementById('minorrelation').style.display = 'block';
                                    document.getElementById('guardianname').style.display = 'block';
                                    }





                                    }</script>
                                <script>
                                    $(document).ready(function () {
										$('#savedatadocs').hide();
                                    focalnation();
                                    });
                                    function focalnation() {
                                    var foc = $('#nationality').val();
                                   
                                    if (foc == 'NRI') {


                                    document.getElementById('divo5').style.display = 'block';
                                    document.getElementById('divo6').style.display = 'block';
                                    document.getElementById('divo7').style.display = 'none';
                                    document.getElementById('divo4').style.display = 'none';
                                    document.getElementById('divo8').style.display = 'none';
                                    document.getElementById('divo9').style.display = 'none';
                                    }
                                    if (foc == 'indiancitizen') {
                                       
                                    document.getElementById('divo4').style.display = 'block';
                                    document.getElementById('divo7').style.display = 'block';
                                    document.getElementById('divo6').style.display = 'none';
                                    //$('#divo7').css("display","block");
                                    
                                    document.getElementById('divo5').style.display = 'none';
                                    document.getElementById('divo8').style.display = 'none';
                                    document.getElementById('divo9').style.display = 'none';
                                    }
                                    if (foc == 'OCI') {

                                    document.getElementById('divo5').style.display = 'block';
                                    document.getElementById('divo8').style.display = 'block';
                                    document.getElementById('divo9').style.display = 'none';
                                    document.getElementById('divo6').style.display = 'none';
                                    document.getElementById('divo7').style.display = 'none';
                                    document.getElementById('divo4').style.display = 'none';
                                    
                                    }
                                    if (foc == 'PIO') {

                                    document.getElementById('divo9').style.display = 'block';
                                    document.getElementById('divo5').style.display = 'block';
                                    document.getElementById('divo8').style.display = 'none';
                                    document.getElementById('divo6').style.display = 'none';
                                    
                                    document.getElementById('divo7').style.display = 'none';
                                    document.getElementById('divo4').style.display = 'none';
                                    }

                                    }


                                </script>

                                </script>
                                <script type="text/javascript">
                                    function capitalize(textboxid, str) {
                                    // string with alteast one character
                                    if (str && str.length >= 1)
                                    {
                                    var firstChar = str.charAt(0);
                                    var remainingStr = str.slice(1);
                                    str = firstChar.toUpperCase() + remainingStr.toUpperCase();
                                    }
                                    document.getElementById(textboxid).value = str;
                                    }
                                </script>
                                <script>
                                    function checkvalidatn(birthdayp) {
                                    // birthday is a date
                                    var str = birthdayp.toString("y-m-d");
                                    var birthday = new Date(str);
                                    var ageDifMs = Date.now() - birthday.getTime();
                                    var ageDate = new Date(ageDifMs); // miliseconds from epoch
                                    var userage = Math.abs(ageDate.getUTCFullYear() - 1970);
                                    if (userage < 18) {
                                    alert('Age Should be greater than 18.');
                                    $('#dob').val("");
                                    }
                                    }
                                </script>
								<script>
								var currentTab = 0; // Current tab is set to be the first tab (0)
								showTab(currentTab); // Display the crurrent tab

								function showTab(n) {
								  // This function will display the specified tab of the form...
								  var x = document.getElementsByClassName("tab");
								  x[n].style.display = "block";
								  //... and fix the Previous/Next buttons:
								  if (n == 0) {
									document.getElementById("prevBtn").style.display = "none";
									document.getElementById("savedatadocs").style.display = "none";
								  } else {
									document.getElementById("prevBtn").style.display = "inline";
									document.getElementById("savedatadocs").style.display = "none";
								  }
								  if (n == (x.length - 1)) {
									document.getElementById("savedatadocs").style.display = "block";
									document.getElementById("nextBtn").style.display = "none";
								  } else {
									document.getElementById("nextBtn").style.display = "block";
								  }
								  //... and run a function that will display the correct step indicator:
								  fixStepIndicator(n)
								}

								function nextPrev(n) {
								  // This function will figure out which tab to display
								  var x = document.getElementsByClassName("tab");
								  // Exit the function if any field in the current tab is invalid:
								 // if (n == 1 && !validateForm()) return false;
								  // Hide the current tab:
								  x[currentTab].style.display = "none";
								  // Increase or decrease the current tab by 1:
								  currentTab = currentTab + n;
								  // if you have reached the end of the form...
								  if (currentTab >= x.length) {
									// ... the form gets submitted:
									document.getElementById("regForm").submit();
									return false;
								  }
								  // Otherwise, display the correct tab:
								  showTab(currentTab);
								}

								function validateForm() {
								  // This function deals with validation of the form fields
								  var x, y, i, valid = true;
								  x = document.getElementsByClassName("tab");
								  y = x[currentTab].getElementsByTagName("input");
								  //alert(y.length);
								  // A loop that checks every input field in the current tab:
								  for (i = 0; i < 5; i++) {
									// If a field is empty...
									if (y[i].value == "") {
									  // add an "invalid" class to the field:
									 // y[i].className += " invalid";
									  // and set the current valid status to false
									  valid = false;
									}
								  }
								  // If the valid status is true, mark the step as finished and valid:
								  if (valid) {
									//document.getElementsByClassName("step")[currentTab].className += " finish";
								  }
								  return valid; // return the valid status
								}

								function fixStepIndicator(n) {
								  // This function removes the "active" class of all steps...
								  var i, x = document.getElementsByClassName("step");
								  for (i = 0; i < x.length; i++) {
									//x[i].className = x[i].className.replace(" active", "");
								  }
								  //... and adds the "active" class on the current step:
								 // x[n].className += " active";
								}
								</script>

                                <!-- END PRIVACY SETTINGS TAB -->
                            </div>
                        </div>
                    </div>
					
                </div>

                <?php
$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_profile");
if ($getprofilestatus) {
	
    $count = $getprofilestatus->process_status;
} else {
    $count = 0;
}

$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id, "my_KYC_upload");
if ($getprofilestatus1) {
    $count1 = $getprofilestatus1->process_status;
} else {
    $count1 = 0;
}

?>
				<div class="col-md-2 text-center progress_chrt">
									<ul class="user_progrss">
										<li class="">
											<p class="percent_prof"><?php echo $count ?>%</p><br>
										<span class="span_prof"><b>Profile</b></span>
										</li>
										<li class="">
											<a href="<?php echo Yii::$app->urlManager->createUrl(['common/documents']) ?>" style="color:#000000 !important;"><p class="percent_prof"><?php echo $count1 ?>%</p><br>
											<span class="span_prof"><b>Documents</b></span></a>
										</li>
										
									</ul>
								</div>
            </div>


        </div>
    </div>
</div>
<!-- end MTPROFILE -->
<!-- start MTPROFILE status section -->




</div></div>
<!-- end MTPROFILE status section -->




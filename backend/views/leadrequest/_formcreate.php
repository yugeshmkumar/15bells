<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */
?>
  


 <div class="row">
 <div class="col-md-9">
<div class="portlet light ">
                               <div class="portlet-title tabbable-line">
                                   
                                    <ul class="nav nav-tabs">
									 <li class="active">
                                            <a href="#portlet_tab1" data-toggle="tab"> Personal Info </a>
                                        </li>
										<li>
                                            <a href="#portlet_tab2" data-toggle="tab"> Company Details </a>
                                        </li>
                                        <li>
                                            <a href="#portlet_tab3" data-toggle="tab"> Product Details </a>
                                        </li>
                                        
                                       
                                    </ul>
                                </div>
                                <div class="portlet-body">
								  <?php $form = ActiveForm::begin([
								  'class'=>'form-horizontal'
								  ]); ?>
								   <div class="tab-content">
                                   <div class="tab-pane active" id="portlet_tab1">
                                            <p>
											  <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-pencil"></i> Name</b></label>
                                                <div class="col-md-9">
												 <div class="input-icon right">
                                                        <i class="fa fa-pencil"></i>
												    <?php echo $form->field($model, 'requestName')->textInput(['maxlength' => true ,'class'=>'form-control' ,'placeholder'=>'Enter Name'])->label(false); ?>
                                                    </div>
                                                </div>
                                            </div>
											 <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-envelope"></i> Email Address</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-envelope"></i>
														<?php echo $form->field($model, 'requestEmail')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Email'])->label(false); ?>
                                           
										                 </div>
										                      </div>
                                                               </div>
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-phone"></i> Contact Number</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-phone"></i>
														
														<?php echo $form->field($model, 'teleNo')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Number'])->label(false); ?>
                                           
										                 </div>
										                      </div>
                                                               </div>
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-calendar"></i> Date Of Birth</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-calendar"></i>
														<?php
														echo DatePicker::widget([
    'model' => $model, 
    'attribute' => 'dob',
    'options' => ['placeholder' => 'Enter DOB...'],
    'pluginOptions' => [
        'autoclose'=>true
    ]
]);

?>
<br/>
														
										                 </div>
										                      </div>
                                                               </div>
															   				 
                                           
                                           
                                          
											

                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-edit"></i> Message</b></label>
                                                <div class="col-md-9">
												
                                                <?php echo $form->field($model, 'rquestMessage')->textArea(['maxlength' => true,'rows'=>3,'class'=>'form-control'])->label(false); ?>

                                                   
                                                </div>
                                            </div>
                                           
                                        <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-user"></i> Gender</b></label>
                                                <div class="col-md-9">
												                       <?php  echo $form->field($model, 'sex')->inLine()->radioList(['male' => 'Male', 'female' => 'Female'])->label(false);?>
										

                                                 
                                                </div>
                                            </div>
												
												</p>
                                          
                                        </div>
										  <div class="tab-pane" id="portlet_tab2">
                                            <p>
										
                                            
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-pencil"></i> Company </b></label>
                                                <div class="col-md-9">
												 <div class="input-icon right">
                                                        <i class="fa fa-pencil"></i>
														 
												    <?php echo $form->field($model3, 'name')->textInput(['maxlength' => true ,'class'=>'form-control' ,'placeholder'=>'Enter Company'])->label(false); ?>
                                                   
												   </div>
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-edit"></i> Company Description</b></label>
                                                <div class="col-md-9">
												
                                                <?php echo $form->field($model3, 'description')->textArea(['maxlength' => true,'rows'=>3,'class'=>'form-control'])->label(false); ?>

                                                   
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-won"></i> Website</b></label>
                                                <div class="col-md-9">
												 <div class="input-icon right">
                                                        <i class="fa fa-won"></i>
														 
                                                <?php echo $form->field($model3, 'website')->textInput(['maxlength' => true,'class'=>'form-control','placeholder'=>'Enter Website'])->label(false); ?>

                                                   
                                                </div></div>
                                            </div>
											
											<div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-envelope"></i> Email Address</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                           <i class="fa fa-envelope"></i>
														 
 <?php echo $form->field($model3, 'email1')->textInput(['class'=>'form-control','placeholder'=>'Enter Email'])->label(false); ?>
                                                   

                                           
										                 </div>
										                      </div>
                                                               </div>
															   
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-phone"></i> Contact Number1</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                           <i class="fa fa-phone"></i>
														 
 <?php echo $form->field($model3, 'contact1')->textInput(['class'=>'form-control','placeholder'=>'Enter Number1'])->label(false); ?>
                                                   

                                           
										                 </div>
										                      </div>
                                                               </div>
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-phone"></i> Contact Number2</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-phone"></i>
														    
											   <?php echo $form->field($model3, 'contact2')->textInput(['class'=>'form-control','placeholder'=>'Enter Number2'])->label(false); ?>
                                                                  </div>
										                      </div>
                                                               </div>
															    
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map-o"></i> Address</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map-o"></i>
														
														<?php echo $form->field($model3, 'address')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Address'])->label(false); ?>
                                         </div>
										                      </div>
                                                               </div>
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map-pin"></i> Location</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map-pin"></i>
														
														<?php echo $form->field($model3, 'location')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Location'])->label(false); ?>
                                         </div>
										                      </div>
                                                               </div>
															    <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map-signs"></i> City</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map-signs"></i>
														
	                                                       <?php echo $form->field($model3, 'city')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter City'])->label(false); ?>
                                          
										                 </div>
										                      </div>
                                                               </div>
															    <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map"></i> Country</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map"></i>
														
										  <?php echo $form->field($model3, 'country')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Country'])->label(false); ?>
                                          
										                 </div>
										                      </div>
                                                               </div>
											
                                          
                                           
                                      
												</p>
                                          
                                        </div>
										  <div class="tab-pane" id="portlet_tab3">
                                            <p>
											
												 <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-pencil"></i> Product </b></label>
                                                <div class="col-md-9">
												 <div class="input-icon right">
                                                        <i class="fa fa-pencil"></i>
														 
												    <?php echo $form->field($model2, 'productname')->textInput(['maxlength' => true ,'class'=>'form-control' ,'placeholder'=>'Enter Product'])->label(false); ?>
                                                    </div>
                                                </div>
                                            </div>
											 <div class="form-group">
                                                <label class="col-md-3 control-label"><b><i class="fa fa-edit"></i> Description</b></label>
                                                <div class="col-md-9">
												
                                                <?php echo $form->field($model2, 'description')->textArea(['maxlength' => true,'rows'=>3,'class'=>'form-control'])->label(false); ?>

                                                   
                                                </div>
                                            </div>
											
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-arrow-down"></i> Product Type</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                       
														    <?php echo $form->field($model2, 'producttype')->dropDownList([ 'ambient' => 'Ambient', 'outdoor' => 'Outdoor', 'transit' => 'Transit', 'transient' => 'Transient', ], ['prompt' => 'Select..','class'=>'form-control'])->label(false);  ?>


                                           
										                 </div>
										                      </div>
                                                               </div>
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-rupee"></i> Budget</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-rupee"></i>
														    
											   <?php echo $form->field($model2, 'currentvalue')->textInput(['class'=>'form-control','placeholder'=>'Enter Current Value'])->label(false); ?>
                                                                  </div>
										                      </div>
                                                               </div>
															    
															   <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map-pin"></i> Location</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map-pin"></i>
														
														<?php echo $form->field($model2, 'location')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Location'])->label(false); ?>
                                         </div>
										                      </div>
                                                               </div>
															    <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map-signs"></i> City</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map-signs"></i>
														
	                                                       <?php echo $form->field($model2, 'city')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter City'])->label(false); ?>
                                          
										                 </div>
										                      </div>
                                                               </div>
															    <div class="form-group">
                                             <label class="col-md-3 control-label"><b><i class="fa fa-map"></i> Country</b></label>
                                                <div class="col-md-9">
                                                    <div class="input-icon right">
                                                        <i class="fa fa-map"></i>
														
										  <?php echo $form->field($model2, 'country')->textInput(['maxlength' => true ,'class'=>'form-control','placeholder'=>'Enter Country'])->label(false); ?>
                                          
										                 </div>
										                      </div>
                                                               </div>
											
                                          
											

											<div class="form-actions">
										
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
													<br/>
												 <?php echo Html::submitButton($model->isNewRecord ? 'Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn green' : 'btn btn-primary']) ?>
 
                                                    <button type="button" class="btn default">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
												
												</p>
                                          
                                        </div>  </div> 
                                     
                                          
										
                                        
                                     <?php ActiveForm::end(); ?>
                                </div>
								
								 </div>
								  </div>
								   </div>
   

  

  


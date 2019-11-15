 <?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */
?>

 
    <?php $form = ActiveForm::begin(); ?>
 <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Product Details</div>
                                                <div class="tools">
                                                     <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffx').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffx').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;">x</a>
                                                    
                                                </div>
                                            </div>
											
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
												<div class="row">
												
                                                <form action="#" class="form-horizontal">
											
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
															 <?php echo $form->field($model, 'requestName')->textInput(['maxlength' => true,'class'=>'form-control input-circle','placeholder'=>'Enter text'])->label(false); ?>
                                                            
                                                            </div>
															
															<div class="col-md-4">
															
															  <?php echo $form->field($model, 'requestEmail')->textInput(['maxlength' => true,'class'=>'form-control input-circle','placeholder'=>'Enter email'])->label(false); ?>
                                                               
                                                        </div></div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
							
                                                                    <input type="email" class="form-control input-circle-right" placeholder="Email Address"> </div>
                                                            </div>
															 <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
							
                                                                    <input type="email" class="form-control input-circle-right" placeholder="Email Address"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control input-circle-left" placeholder="Password">
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
															 <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control input-circle-left" placeholder="Password">
                                                                    <span class="input-group-addon input-circle-right">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
                                                                <div class="input-icon">
                                                                    <i class="fa fa-bell-o"></i>
                                                                    <input type="text" class="form-control input-circle" placeholder="Left icon"> </div>
                                                            </div>
															 <div class="col-md-4">
                                                                <div class="input-icon">
                                                                    <i class="fa fa-bell-o"></i>
                                                                    <input type="text" class="form-control input-circle" placeholder="Left icon"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-microphone"></i>
                                                                    <input type="text" class="form-control input-circle" placeholder="Right icon"> </div>
                                                            </div>
															  <div class="col-md-4">
                                                                <div class="input-icon right">
                                                                    <i class="fa fa-microphone"></i>
                                                                    <input type="text" class="form-control input-circle" placeholder="Right icon"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
                                                                <input type="password" class="form-control spinner input-circle" placeholder="Password">
																</div>
																<div class="col-md-4">
                                                                <input type="password" class="form-control spinner input-circle" placeholder="Password">
																</div>
                                                        </div>
                                                        <div class="form-group last">
                                                            <label class="col-md-2 control-label"></label>
                                                            <div class="col-md-4">
                                                                <span class="form-control-static"></span>
                                                            </div>
															 <div class="col-md-4">
                                                                <span class="form-control-static"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
															
                                                                <button type="submit" class="btn btn-circle blue">Submit</button>
                                                                <a onclick="document.getElementById('viewpsambqwksukvveekmuzqtsimabbffx').style.display='none';document.getElementById('viewpsambqwksukvveekmuzqtsimaccffx').style.display='none'" style="cursor:pointer; color:#FFFFFF; font-weight:800;" class="btn btn-circle btn-danger">
                                                    Cancel</a>
                                                            </div>
														
                                                        </div>
                                                    </div> 
													
                                                </form>
												
                                                <!-- END FORM-->
                                            </div></div>
                                        </div> 


 
 <?php
 use yii\helpers\Html;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
 $userid = Yii::$app->user->identity->id;
 $user = \common\models\User::find()->where(['id'=>$userid])->one();

 ?>
  <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>User</span>
								 <i class="fa fa-circle"></i>
                            </li>
							 <li>
                                <span>My Expectations</span>
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div class="btn-group pull-right">
                                <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li>
                                        <a href="#">
                                            <i class="icon-bell"></i> Action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-shield"></i> Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-user"></i> Something else here</a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-bag"></i> Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
					<br/>
		 <?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						
						$getprofilestatus1 = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_KYC_upload");
						if($getprofilestatus1){$count1 = $getprofilestatus1->process_status ;}
						else{$count1 = 0;}
						?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light portlet-fit bordered">
                               
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        <div class="row step-line">
                                            <?php $checkrole = \common\models\activemode::checkmyrole(Yii::$app->user->identity->id);
						if($checkrole->item_name == "Company_user"){
						?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/copostlogin']) ?>">
                       <?php } else { ?><a href="<?php echo Yii::$app->urlManager->createUrl(['site/postlogin']) ?>"><?php } ?>
                                   <div class="col-md-4 mt-step-col first ">
                                                <div class="mt-step-number bg-white" style="padding:12px 18px; margin-top: -8px;">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                               <div class="mt-step-title uppercase font-grey-cascade">My Profile</div>
                                                <div class="mt-step-content font-grey-cascade">Fill Your Profile <br/><?php echo $count ?>%</div>
                                            </div></a>
												 <a href="<?php echo Yii::$app->urlManager->createUrl(['/common/documents']) ?>">
                                            <div class="col-md-4 mt-step-col">
                                                <div class="mt-step-number bg-white" style="padding:12px 18px; margin-top: -8px;">
                                                    <i class="fa fa-file"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">My Documents</div>
                                                <div class="mt-step-content font-grey-cascade">Add Your Documents <br/><?php echo $count1 ?>%</div>
                                            </div></a>
											 <a href="<?php echo Yii::$app->urlManager->createUrl(['/lessoraction/addrfp']) ?>">
                                            <div class="col-md-4 mt-step-col last done">
                                                <div class="mt-step-number bg-white" style="padding:12px 18px; margin-top: -8px;">
                                                    <i class="icon-rocket"></i>
                                                </div>
                                                <div class="mt-step-title uppercase font-grey-cascade">MY EXPECTATIONS</div>
                                                <div class="mt-step-content font-grey-cascade">My Request  <br/>0</div>
                                            </div></a>
                                        </div>
                                        <br/>
                                        <br/>
                                        
                                    </div>
									 
                                    <!-- BEGIN FORM-->
									 <div class="portlet light portlet-fit portlet-form ">
                               <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-plus font-blue"></i>
                                       <a href="<?php echo Yii::$app->urlManager->createUrl(['/my-property/create']) ?>">  <span class="caption-subject font-blue sbold uppercase"> Add Direct Request</span></a>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body">
                                    <form action="#" id="form_sample_3">
									
                                        <div class="form-body">
										
											<div class="form-group form-md-radios form-md-floating-label">
                                            <label>I am a</label>
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                    <input type="radio" id="radio6" name="radio2" class="md-radiobtn">
                                                    <label for="radio6">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Seller</label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="radio7" name="radio2" class="md-radiobtn" checked>
                                                    <label for="radio7">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Tenant</label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="radio8" name="radio2" class="md-radiobtn">
                                                    <label for="radio8">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Landlord </label>
                                                </div>
												 <div class="md-radio">
                                                    <input type="radio" id="radio9" name="radio2" class="md-radiobtn">
                                                    <label for="radio9">
                                                        <span></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Tenant </label>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                 <div class="input-group">
                                                    <input type="text" class="form-control" name="email2">
                                                    <label for="form_control_1">Name</label>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="email2">
                                                    <label for="form_control_1">Email</label>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group form-md-line-input form-md-floating-label">
											<div class="input-group">
                                                <input type="text" class="form-control" name="number" id="form_control_1">
                                                <label for="form_control_1">Mobile Number</label>
                                                <span class="input-group-addon">
                                                        <i class="fa fa-tty"></i>
                                                    </span>
                                            </div></div>
										
                                           
                                            <div class="form-group form-md-line-input form-md-floating-label">
                                                <textarea class="form-control" name="memo" rows="3"></textarea>
                                                <label for="form_control_1">Description</label>
                                                <span class="help-block">Add Required property description...</span>
                                            </div>
                                           
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn dark">Validate</button>
                                                    <button type="reset" class="btn default">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div></div> </div></div>
                            </div> <?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						?>
						<!--<div class="col-md-3"><div class="dashboard-stat2" style="background-color:#fafafa">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="100"><?php echo $count ?></span>
                                            <small class="font-green-sharp">%</small>
                                        </h3>
                                        <small>PROFILE COMPLETE</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
								  <div class="progress-info">
								  <div class="status">
								  <a href="<?//php echo Yii::$app->urlManager->createUrl(['myprofile/create']) ?>" style="width:100%;height:2%"class="btn default">Add details</a>
								  </div> </div>
								  <br/>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: <?//php echo $count ?>%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only"><?//php echo $count ?>% progress</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title"> progress </div>
                                        <div class="status-number"> <?//php echo $count ?>% </div>
                                    </div>
                                </div>
									</div></div>-->
									
									</div>

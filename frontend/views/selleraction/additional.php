<?php
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

  <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

 <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="index.html">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#">SELLERS</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>ADD PROPERTY</span>
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
                    <!-- BEGIN : STEPS -->
                    <div class="row">
                        <div class="col-md-9">
                            <div class="portlet light portlet-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-plus font-blue"></i>
                                        <span class="caption-subject font-green bold uppercase">ADD PROPERTY</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="mt-element-step">
                                        
                                        <div class="row step-thin">
                                          <a href="<?php echo Yii::$app->urlManager->createUrl(['selleraction/additional?id='.$_GET['id'].'']) ?>">
                                            <div class="col-md-4 bg-grey mt-step-col">
                                                <div class="mt-step-number bg-white font-grey">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"><font size="4dp">BASIC DETAILS</font></div>
                                                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
                                            </div></a><a href="<?php echo Yii::$app->urlManager->createUrl(['selleraction/additional?id='.$_GET['id'].'']) ?>">
                                            <div class="col-md-4 bg-grey mt-step-col active">
                                                <div class="mt-step-number bg-white font-grey">2</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"><font size="3dp">ADDITIONAL DETAILS</font></div>
                                                <div class="mt-step-content font-grey-cascade"><!--Complete your property check--></div>
                                            </div></a>
                                           
                                        </div>
                                        <br/>
                                        <br/>
                                    
                                    </div>
								
											 <div class="form-group form-md-checkboxes has-success">
										
                                                <label class="col-md-3 control-label" for="form_control_1">UPLOAD IMAGE</label>
                                                <div class="col-md-9">
                                                     
                                                     <?php  echo $form->field($model, 'featured_image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
])->label(false); ?>
                                                      
                                                        <!--<div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_4" class="md-check" checked="">
                                                            <label for="checkbox1_4">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Rent </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox1_5" class="md-check">
                                                            <label for="checkbox1_5">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> PG Accomodation </label>
                                                        </div>-->
                                                   
                                            </div>
                                            </div>
											 <div class="form-group form-md-checkboxes has-success">
										
                                                <label class="col-md-3 control-label" for="form_control_1"> UPLOAD THUMBNAILS</label>
                                                <div class="col-md-9">
                                                   
                                                    <?php  


echo FileInput::widget([
    //'model' => $model,
    'name' => 'featured_thumbnails_id',
	 'id' => 'featured_thumbnails_id',
    'options' => ['multiple' => true],
	'pluginOptions' => ['previewFileType' => 'any', 'uploadUrl' => Url::to(['/selleraction/fileupload?id='.$_GET['id'].'']),]
]);
?>
                                                   
                                                </div>
                                            </div>
                                           </div>
                                            </div>
											
                                           
                                      
                                       
                                   
                                    <!-- END FORM-->
                                    <!-- END FORM-->
									
									<!-- end form -->
									
                                </div>
                            
						
						<div class="col-md-3"><div class="dashboard-stat2" style="background-color:#fafafa">
                                <div class="display">
                                    <div class="number">
                                        <h3 class="font-green-sharp">
                                            <span data-counter="counterup" data-value="100">6</span>
                                            <small class="font-green-sharp">%</small>
                                        </h3>
                                        <small>PROFIT COMPLETE</small>
                                    </div>
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
								  <div class="progress-info">
								  <div class="status">
								  <a href="<?php echo Yii::$app->urlManager->createUrl(['myprofile/create']) ?>" style="width:100%;height:2%"class="btn default">Add details</a>
								  </div> </div>
								  <br/>
                                <div class="progress-info">
                                    <div class="progress">
                                        <span style="width: 6%;" class="progress-bar progress-bar-success green-sharp">
                                            <span class="sr-only">6% progress</span>
                                        </span>
                                    </div>
                                    <div class="status">
                                        <div class="status-title"> progress </div>
                                        <div class="status-number"> 6% </div>
                                    </div>
                                </div>
									</div></div>
                    </div>
                    <!-- END : STEPS -->
					
					 
                </div>
                <!-- END CONTENT BODY -->
         <?php ActiveForm::end(); ?>
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
                                <a href="#">LAND LORD</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>ADD PROPERTY</span>
                            </li>
                        </ul>
                       
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN : STEPS -->
                    <div class="row">
                        <div class="col-md-12">
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
                                          <a href="<?php echo Yii::$app->urlManager->createUrl(['landlordaction/additional?id='.$_GET['id'].'']) ?>">
                                            <div class="col-md-4 bg-grey mt-step-col">
                                                <div class="mt-step-number bg-white font-grey">1</div>
                                                <div class="mt-step-title uppercase font-grey-cascade"><font size="4dp">BASIC DETAILS</font></div>
                                                <div class="mt-step-content font-grey-cascade"><!--Sell / Rent /PG Accomodation--></div>
                                            </div></a><a href="<?php echo Yii::$app->urlManager->createUrl(['lessoraction/additional?id='.$_GET['id'].'']) ?>">
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
                            
						<?php 
						$getprofilestatus = \common\models\activemode::checkprofilestats(Yii::$app->user->identity->id,"my_profile");
						if($getprofilestatus){$count = $getprofilestatus->process_status ;}
						else{$count = 0;}
						?>
						
                    </div>
                    <!-- END : STEPS -->
					
					 
                </div>
                <!-- END CONTENT BODY -->
         <?php ActiveForm::end(); ?>

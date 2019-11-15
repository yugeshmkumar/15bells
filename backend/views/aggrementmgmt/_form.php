 
 <?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model common\models\Aggrementmgmt */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="aggrementmgmt-form">

    <?php $form = ActiveForm::begin(); ?>
 
 
 <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light form-fit ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-plus"></i>
                                        <span class="caption-subject font-blue bold uppercase">Add Agreement</span>
                                    </div>
                                    <div class="actions">
                                        
                                    </div>
                                </div>
                                <div class="portlet-body">
                                   
                                        <div class="form-body">
										<div class="form-group">
										Subject
                                                     <?php echo $form->field($model, 'subject')->textarea(['rows' => 2],['class'=>'form-control'])->label(false); ?>
                                                
                                            </div>
                                            <div class="form-group">
											<?php if(isset($_GET['id'])) { 
											$Aggrementmgmt = \common\models\Aggrementmgmt::find()->where(['id'=>$_GET['id']])->one(); }
											 ?>
                                                <textarea name="content" id="content" data-provide="markdown" rows="20"  class="form-control"><?php if(isset($Aggrementmgmt)) { ?><?php echo $Aggrementmgmt->content ?> <?php } ?></textarea>
                                               
                                            </div><br/>
											<div class="form-group">
                                            <div class="col-md-12">
											From Date
                                                    <input type="date" name="fromdatetime" id="fromdatetime" <?php if(isset($Aggrementmgmt)) { ?> value="<?php echo $Aggrementmgmt->fromdatetime ?>" <?php } ?>class="form-control">
                                                </div>
                                          
                                            </div>
											 <div class="col-md-12">
											 <br/>
											  <?php $arrroles=\common\models\UserRoles::find()->all();
$listroles=ArrayHelper::map($arrroles,'id','rolename');
											  ?>
                                               <?php echo $form->field($model, 'roleid')->widget(Select2::classname(), [
                                                                'language' => 'de',
                                                             'data' =>($listroles),	 
	                                                           'options' => ['multiple' =>true,'placeholder' =>'Select Role..'],
                                                                 'pluginOptions' => [
                                                                  'allowClear' => true
                                                                    ], ]);
                                                              ?> 
																	
                                                </div>
												<div class="col-md-6">
											
											
											    
												<?php 
  echo $form->field($model, 'eventname')->dropdownList(['Signup'=>'Signup', 'Login' => 'Login', 'Other' => 'Other', 'Backend' =>'Backend'], ['prompt' => 'Select..']) ?>

                                                </div>
												 <div class="col-md-6">
											
											  <?= $form->field($model, 'ispublish')->inline()->radioList(['1' => 'Yes', '0' => 'No']) ?>
											   
																	
                                                </div>
                                         </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-2 col-md-10">
                                                    
                                                      <?php echo Html::submitButton($model->isNewRecord ? '<i class="fa fa-check" ></i> Submit' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
 
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					
					  <?php ActiveForm::end(); ?>
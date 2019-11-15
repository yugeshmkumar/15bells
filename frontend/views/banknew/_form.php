<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banknew */
/* @var $form yii\widgets\ActiveForm */
$userid = Yii::$app->user->identity->id;
?>
<?php 

$form = ActiveForm::begin(); ?>

<div class="col-md-9 content_dashboard no_pad">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
						<h2 class="dashboard_head">Account holder details</h2>
					</div>
					
				</div>
				<div class="col-md-12 detail_update">
				
                	<div class="row bank_edit">
						
                        <div class="col-md-6 date_select">
<?= $form->field($model, 'bank_name')->textInput(['placeholder' => "Bank Name", 'class' => "form-control input_desgn"])->label(false) ?>
                    
                        </div>

                         <div class="col-md-6 date_select">
                         <?= $form->field($model, 'bank_accnt_name')->textInput(['placeholder' => "Account holder name", 'class' => "form-control input_desgn"])->label(false) ?>

                        </div>
						
                        <div class="col-md-6 date_select">
                        <?= $form->field($model, 'account_no')->textInput(['placeholder' => "Enter you account number", 'class' => "form-control input_desgn"])->label(false) ?>

                        </div>
						
                        <div class="col-md-6 date_select">
                        <?= $form->field($model, 'isfc_code')->textInput(['placeholder' => "Enter your Ifsc code", 'class' => "form-control input_desgn"])->label(false) ?>

                        </div>


                        <div class="col-md-6 text-right addprop_button">
                        
                        <?= $form->field($model, 'account_type')->dropDownList(['Savings' => 'Savings', 'Current' => 'Current', 'salary' => 'Salary',], ['prompt' => 'Type of Account','class' => "form-control one_inpt"])->label(false) ?>
                        </div>
						
                        <!-- <div class="col-md-6 text-right addprop_button">
							<div class="dropdown">
								<button id="dLabel" class="dropdown-select account_dropdown" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Type of Account
								<span class="caret_filter"><img src="<?= Yii::getAlias('@frontendUrl').'/newimg/img/icons/grey_arrow.svg';  ?>" width="18" class="svg_drop"></span>
								</button>
								 <ul class="dropdown-menu User_role" aria-labelledby="dLabel">
								<li>Saving</li>
								<li>Current</li>
								<li>NRI</li>
								 </ul>
							</div>
						</div> -->
						<div class="col-md-12 save_profile">
                        <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'save_button' : 'save_button']) ?>

								
                                <a href="#" class="edit_profile">Cancel</a>
						</div>
					</div>			
				</div>
			</div>
  		</div>
          <?php ActiveForm::end(); ?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Emd_details */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emd-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emd_id')->textInput() ?>

    <?= $form->field($model, 'utr_no')->textInput() ?>

    <?= $form->field($model, 'utr_bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utr_bank_branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'utr_date')->textInput() ?>

    <?= $form->field($model, 'dd_no')->textInput() ?>

    <?= $form->field($model, 'dd_bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dd_bank_branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dd_date')->textInput() ?>

    <?= $form->field($model, 'person_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tracking_id')->textInput() ?>

    <?= $form->field($model, 'payment_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payable_amount')->textInput() ?>

    <?= $form->field($model, 'favour_of')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

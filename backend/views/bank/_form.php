<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Bank */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="bank-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'bank_name')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'account_no')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'isfc_code')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'account_type')->dropDownList([ 'Savings' => 'Savings', 'Current' => 'Current', 'salary' => 'Salary', 'escrow' => 'Escrow', 'business' => 'Business', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'branch_name')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'bank_accnt_name')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocuments */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-kycdocuments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'userid')->textInput() ?>

    <?php echo $form->field($model, 'document_name')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'file_type')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'docment_file_name')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'document_file_path')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'document_file_name_extenstn')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'approve_status')->textInput() ?>

    <?php echo $form->field($model, 'approve_reason')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'approved_by')->textInput() ?>

    <?php echo $form->field($model, 'approved_at')->textInput() ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'isactive')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

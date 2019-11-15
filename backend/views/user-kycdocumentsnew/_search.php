<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserKycdocumentsnewSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-kycdocuments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'userid') ?>

    <?php echo $form->field($model, 'document_name') ?>

    <?php echo $form->field($model, 'file_type') ?>

    <?php echo $form->field($model, 'docment_file_name') ?>

    <?php // echo $form->field($model, 'document_file_path') ?>

    <?php // echo $form->field($model, 'document_file_name_extenstn') ?>

    <?php // echo $form->field($model, 'approve_status') ?>

    <?php // echo $form->field($model, 'approve_reason') ?>

    <?php // echo $form->field($model, 'approved_by') ?>

    <?php // echo $form->field($model, 'approved_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

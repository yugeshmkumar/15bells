<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RequestEmd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-emd-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'payable_amount')->textInput() ?>

    <?= $form->field($model, 'escrow_account_id')->textInput() ?>

    <?= $form->field($model, 'payment_status')->dropDownList([ 'pay_now' => 'Pay now', 'pending' => 'Pending', 'paid' => 'Paid', 'failed' => 'Failed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

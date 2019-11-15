<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-site-visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'request_status')->dropDownList([ 'requested' => 'Requested', 'pay_now' => 'Pay now', 'pending' => 'Pending', 'paid' => 'Paid', 'rejected' => 'Rejected', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pickup_location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'drop_location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'landmark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'terms_conditions_id')->textInput() ?>

    <?= $form->field($model, 'terms_conditions_files')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_payable')->textInput() ?>

    <?= $form->field($model, 'feedback')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'scheduled_time')->textInput() ?>

    <?= $form->field($model, 'visit_status_confirm')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

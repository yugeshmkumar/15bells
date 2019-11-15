<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MyProfileProgressStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-profile-progress-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'process_name')->dropDownList([ 'my_profile' => 'My profile', 'my_KYC_upload' => 'My KYC upload', 'my_KYC_approval' => 'My KYC approval', 'escrow_transaction' => 'Escrow transaction', 'escrow_transaction_approval' => 'Escrow transaction approval', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'process_status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'role_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

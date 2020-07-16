<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VRWin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vrwin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'vr_id')->textInput() ?>

    <?= $form->field($model, 'prop_id')->textInput() ?>

    <?= $form->field($model, 'lesse_buyer_id')->textInput() ?>

    <?= $form->field($model, 'lessor_seller_id')->textInput() ?>

    <?= $form->field($model, 'auction_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

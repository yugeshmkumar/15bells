<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'invoiceID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'propertyid')->textInput() ?>

    <?= $form->field($model, 'payment_id')->textInput() ?>

    <?= $form->field($model, 'finyearid')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'isActive')->textInput() ?>

    <?= $form->field($model, 'createdAt')->textInput() ?>

    <?= $form->field($model, 'concessionAmount')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

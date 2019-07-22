<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Callbuttonaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="callbuttonaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_phone')->textInput() ?>

    <?= $form->field($model, 'property_id')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

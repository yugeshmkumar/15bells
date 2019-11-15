<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sellor-expectations-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'user_type') ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'save_search_as') ?>

    <?php // echo $form->field($model, 'rate_negotiable') ?>

    <?php // echo $form->field($model, 'payment_time') ?>

    <?php // echo $form->field($model, 'payment_time_negotiable') ?>

    <?php // echo $form->field($model, 'loan_against_property') ?>

    <?php // echo $form->field($model, 'all_dues_cleared') ?>

    <?php // echo $form->field($model, 'vastu_facing') ?>

    <?php // echo $form->field($model, 'loan_to_be_applied') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

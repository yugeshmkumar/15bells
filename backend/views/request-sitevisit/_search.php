<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-site-visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'request_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'request_status') ?>

    <?php // echo $form->field($model, 'pickup_location') ?>

    <?php // echo $form->field($model, 'drop_location') ?>

    <?php // echo $form->field($model, 'landmark') ?>

    <?php // echo $form->field($model, 'terms_conditions_id') ?>

    <?php // echo $form->field($model, 'terms_conditions_files') ?>

    <?php // echo $form->field($model, 'amount_payable') ?>

    <?php // echo $form->field($model, 'feedback') ?>

    <?php // echo $form->field($model, 'scheduled_time') ?>

    <?php // echo $form->field($model, 'visit_status_confirm') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

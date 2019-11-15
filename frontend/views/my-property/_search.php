<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MyPropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="my-property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'site_name') ?>

    <?= $form->field($model, 'site_address') ?>

    <?= $form->field($model, 'super_area') ?>

    <?php // echo $form->field($model, 'carpet_area') ?>

    <?php // echo $form->field($model, 'auto_cad_drawing') ?>

    <?php // echo $form->field($model, 'possession') ?>

    <?php // echo $form->field($model, 'commercial_approved') ?>

    <?php // echo $form->field($model, 'floors') ?>

    <?php // echo $form->field($model, 'agreement') ?>

    <?php // echo $form->field($model, 'tenure') ?>

    <?php // echo $form->field($model, 'rent') ?>

    <?php // echo $form->field($model, 'maintenance') ?>

    <?php // echo $form->field($model, 'last_date_rent') ?>

    <?php // echo $form->field($model, 'fit_out_period') ?>

    <?php // echo $form->field($model, 'electricity_load') ?>

    <?php // echo $form->field($model, 'clarityOn_meter_submeter') ?>

    <?php // echo $form->field($model, 'power_backup') ?>

    <?php // echo $form->field($model, 'property_tax') ?>

    <?php // echo $form->field($model, 'spaceForGenset_ac_watertank') ?>

    <?php // echo $form->field($model, 'car_parking') ?>

    <?php // echo $form->field($model, 'motor_waterSupply') ?>

    <?php // echo $form->field($model, 'stampDuty_registration') ?>

    <?php // echo $form->field($model, 'working_hour_restrict') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

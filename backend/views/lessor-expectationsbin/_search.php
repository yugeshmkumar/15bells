<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectationsbinSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="lessor-expectationsbin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'user_type') ?>

    <?php echo $form->field($model, 'property_id') ?>

    <?php echo $form->field($model, 'save_search_as') ?>

    <?php // echo $form->field($model, 'auto_cad_drawing') ?>

    <?php // echo $form->field($model, 'site_approval') ?>

    <?php // echo $form->field($model, 'wet_points') ?>

    <?php // echo $form->field($model, 'interest_security') ?>

    <?php // echo $form->field($model, 'interest_negotiable') ?>

    <?php // echo $form->field($model, 'agreement') ?>

    <?php // echo $form->field($model, 'agreement_negotiable') ?>

    <?php // echo $form->field($model, 'lease_tenure') ?>

    <?php // echo $form->field($model, 'tenure_negotiable') ?>

    <?php // echo $form->field($model, 'lock_in_period') ?>

    <?php // echo $form->field($model, 'lock_negotiable') ?>

    <?php // echo $form->field($model, 'rent') ?>

    <?php // echo $form->field($model, 'rent_unit') ?>

    <?php // echo $form->field($model, 'rent_negotiable') ?>

    <?php // echo $form->field($model, 'escalation_value') ?>

    <?php // echo $form->field($model, 'escalation_month') ?>

    <?php // echo $form->field($model, 'escalation_negotiable') ?>

    <?php // echo $form->field($model, 'maintenance_value') ?>

    <?php // echo $form->field($model, 'maintenance_unit') ?>

    <?php // echo $form->field($model, 'maintenance_hours') ?>

    <?php // echo $form->field($model, 'maintenance_subject_change') ?>

    <?php // echo $form->field($model, 'last_date_rent') ?>

    <?php // echo $form->field($model, 'last_date_negotiable') ?>

    <?php // echo $form->field($model, 'fit_out_period') ?>

    <?php // echo $form->field($model, 'fit_out_negotiable') ?>

    <?php // echo $form->field($model, 'present_electricity_load') ?>

    <?php // echo $form->field($model, 'canBeIncreased_electricity') ?>

    <?php // echo $form->field($model, 'clarity_on_meter') ?>

    <?php // echo $form->field($model, 'power_backup') ?>

    <?php // echo $form->field($model, 'power_can_be_discussed') ?>

    <?php // echo $form->field($model, 'seperate_space') ?>

    <?php // echo $form->field($model, 'car_parking') ?>

    <?php // echo $form->field($model, 'motor_water_supply') ?>

    <?php // echo $form->field($model, 'water_supply_part_maintenance') ?>

    <?php // echo $form->field($model, 'stamp_duty_lessor') ?>

    <?php // echo $form->field($model, 'stamp_duty_lessee') ?>

    <?php // echo $form->field($model, 'working_restriction') ?>

    <?php // echo $form->field($model, 'washroom_provision') ?>

    <?php // echo $form->field($model, 'usuable_area_length') ?>

    <?php // echo $form->field($model, 'usuable_area_breadth') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

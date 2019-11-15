<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LessorExpectationsbin */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="lessor-expectationsbin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'user_type')->dropDownList([ 'lessor' => 'Lessor', 'lessee' => 'Lessee', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'property_id')->textInput() ?>

    <?php echo $form->field($model, 'save_search_as')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'auto_cad_drawing')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'site_approval')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'wet_points')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'interest_security')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'interest_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'agreement')->dropDownList([ 'Notorised' => 'Notorised', 'Registered' => 'Registered', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'agreement_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'lease_tenure')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'tenure_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'lock_in_period')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'lock_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'rent')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'rent_unit')->dropDownList([ 'per_sq_ft' => 'Per sq ft', 'per_sq_mtr' => 'Per sq mtr', 'per_sq_yards' => 'Per sq yards', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'rent_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'escalation_value')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'escalation_month')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'escalation_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'maintenance_value')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'maintenance_unit')->dropDownList([ 'per_sq_ft' => 'Per sq ft', 'per_sq_mtr' => 'Per sq mtr', 'per_sq_yards' => 'Per sq yards', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'maintenance_hours')->dropDownList([ '12 Hours' => '12 Hours', '24 Hours' => '24 Hours', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'maintenance_subject_change')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'last_date_rent')->textInput() ?>

    <?php echo $form->field($model, 'last_date_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'fit_out_period')->textInput() ?>

    <?php echo $form->field($model, 'fit_out_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'present_electricity_load')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'canBeIncreased_electricity')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'clarity_on_meter')->dropDownList([ 'Submeter_already_in_place' => 'Submeter already in place', 'Submeter_can_be_provided' => 'Submeter can be provided', 'Common_Meter' => 'Common Meter', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'power_backup')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'power_can_be_discussed')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'seperate_space')->dropDownList([ 'Chargeable' => 'Chargeable', 'Not Chargeable' => 'Not Chargeable', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'car_parking')->textInput() ?>

    <?php echo $form->field($model, 'motor_water_supply')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'water_supply_part_maintenance')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'stamp_duty_lessor')->textInput() ?>

    <?php echo $form->field($model, 'stamp_duty_lessee')->textInput() ?>

    <?php echo $form->field($model, 'working_restriction')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'washroom_provision')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'usuable_area_length')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'usuable_area_breadth')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'is_active')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

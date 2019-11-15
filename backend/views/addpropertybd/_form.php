<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Addpropertybackend */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="addpropertybackend-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'role_id')->dropDownList([ 'seller' => 'Seller', 'lessor' => 'Lessor', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'property_for')->dropDownList([ 'sale' => 'Sale', 'rent' => 'Rent', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'project_type_id')->textInput() ?>

    <?php echo $form->field($model, 'request_for')->dropDownList([ 'bid' => 'Bid', 'direct' => 'Direct', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'featured_image')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'featured_video')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'city')->textInput() ?>

    <?php echo $form->field($model, 'locality')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'longitude')->textInput() ?>

    <?php echo $form->field($model, 'latitude')->textInput() ?>

    <?php echo $form->field($model, 'total_plot_area')->textInput() ?>

    <?php echo $form->field($model, 'plot_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'expected_price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'asking_rental_price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'price_sq_ft')->textInput() ?>

    <?php echo $form->field($model, 'price_acres')->textInput() ?>

    <?php echo $form->field($model, 'price_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'revenue_lauout')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'present_status')->dropDownList([ 'agriculture' => 'Agriculture', 'R_zone' => 'R zone', 'institutional' => 'Institutional', 'warehousing' => 'Warehousing', 'others' => 'Others', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'shed_RCC')->dropDownList([ 'Shed' => 'Shed', 'RCC' => 'RCC', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'maintenance_cost')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'maintenance_by')->dropDownList([ 'monthly' => 'Monthly', 'annually' => 'Annually', 'one_time' => 'One time', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'expected_rental')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'membership_charge')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'availability')->dropDownList([ 'under_construction' => 'Under construction', 'ready_to_move' => 'Ready to move', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'available_from')->dropDownList([ 'Immediate' => 'Immediate', 'Date' => 'Date', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'available_date')->textInput() ?>

    <?php echo $form->field($model, 'age_of_property')->dropDownList([ '0-1' => '0-1', '1-5' => '1-5', '5-10' => '5-10', '10+' => '10+', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'possesion_by')->dropDownList([ 'Immediate' => 'Immediate', '30 Days' => '30 Days', '45 Days' => '45 Days', '60 Days' => '60 Days', '90 Days' => '90 Days', '6 Months' => '6 Months', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'rental_type')->dropDownList([ 'monthly' => 'Monthly', 'annualy' => 'Annualy', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'ownership')->dropDownList([ 'freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'ownership_status')->dropDownList([ 'HUF' => 'HUF', 'Single_Owner' => 'Single Owner', 'Multiple_Owner' => 'Multiple Owner', 'Company' => 'Company', 'Panchayat' => 'Panchayat', 'Others' => 'Others', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'facing')->dropDownList([ 'north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'FAR_approval')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'LOAN_taken')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'buildup_area')->textInput() ?>

    <?php echo $form->field($model, 'build_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'carpet_area')->textInput() ?>

    <?php echo $form->field($model, 'carpet_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'total_floors')->textInput() ?>

    <?php echo $form->field($model, 'property_on_floor')->textInput() ?>

    <?php echo $form->field($model, 'configuration')->dropDownList([ '1bhk' => '1bhk', '2bhk' => '2bhk', '3bhk' => '3bhk', '4bhk' => '4bhk', '5bhk' => '5bhk', '>5bhk' => '>5bhk', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'floors_allowed_construction')->textInput() ?>

    <?php echo $form->field($model, 'bedrooms')->textInput() ?>

    <?php echo $form->field($model, 'bathrooms')->textInput() ?>

    <?php echo $form->field($model, 'balconies')->textInput() ?>

    <?php echo $form->field($model, 'pooja_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'study_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'servant_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'other_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'furnished_status')->dropDownList([ 'furnished' => 'Furnished', 'semi_furnished' => 'Semi furnished', 'bareshell' => 'Bareshell', 'raw' => 'Raw', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'parking')->textInput() ?>

    <?php echo $form->field($model, 'is_active')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_date')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList([ 'approved' => 'Approved', 'pending' => 'Pending', 'onhold' => 'Onhold', 'reviewed' => 'Reviewed', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

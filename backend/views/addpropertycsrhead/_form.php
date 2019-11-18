<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Addpropertycsrhead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addpropertycsrhead-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'builder_id')->textInput() ?>

    <?= $form->field($model, 'builder_total_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_id')->dropDownList([ 'seller' => 'Seller', 'lessor' => 'Lessor', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_for')->dropDownList([ 'both' => 'Both', 'sale' => 'Sale', 'rent' => 'Rent', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'project_type_id')->textInput() ?>

    <?= $form->field($model, 'request_for')->dropDownList([ 'bid' => 'Bid', 'Instant' => 'Instant', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'featured_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'featured_video')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locality')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'town_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'no_of_similiar_shops')->textInput() ?>

    <?= $form->field($model, 'buildup_area')->textInput() ?>

    <?= $form->field($model, 'build_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expected_price')->textInput() ?>

    <?= $form->field($model, 'asking_rental_price')->textInput() ?>

    <?= $form->field($model, 'price_sq_ft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_acres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'revenue_lauout')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interior_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'present_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shed_RCC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintenance_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintenance_cost_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintenance_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expected_rental')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'membership_charge')->textInput() ?>

    <?= $form->field($model, 'availability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available_from')->dropDownList([ 'Immediate' => 'Immediate', 'Date' => 'Date', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'available_date')->textInput() ?>

    <?= $form->field($model, 'age_of_property')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'possesion_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rental_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ownership')->dropDownList([ 'freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ownership_status')->dropDownList([ 'HUF' => 'HUF', 'Single_Owner' => 'Single Owner', 'Multiple_Owner' => 'Multiple Owner', 'Company' => 'Company', 'Panchayat' => 'Panchayat', 'Others' => 'Others', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'facing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FAR_approval')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOAN_taken')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'min_super_area')->textInput() ?>

    <?= $form->field($model, 'super_area')->textInput() ?>

    <?= $form->field($model, 'super_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'carpet_area')->textInput() ?>

    <?= $form->field($model, 'carpet_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total_floors')->textInput() ?>

    <?= $form->field($model, 'property_on_floor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'configuration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floors_allowed_construction')->textInput() ?>

    <?= $form->field($model, 'bedrooms')->textInput() ?>

    <?= $form->field($model, 'bathrooms')->textInput() ?>

    <?= $form->field($model, 'balconies')->textInput() ?>

    <?= $form->field($model, 'pooja_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'study_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'servant_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'other_room')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'furnished_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parking')->textInput() ?>

    <?= $form->field($model, 'is_active')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'approved' => 'Approved', 'pending' => 'Pending', 'onhold' => 'Onhold', 'reviewed' => 'Reviewed', ], ['prompt' => '']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

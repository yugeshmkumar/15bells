<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\PropertyType;
use yii\helpers\ArrayHelper;
use backend\models\AddpropertyOnepageForm\AddpropertyOnepageForm;


$modelonepageform = new AddpropertyOnepageForm();

$formOtherDetails = $modelonepageform::find()->where(['property_id'=>$model->id])->one();

// echo '<pre>';print_r($formOtherDetails);die;
if($formOtherDetails){
    
$total_no_of_floors =  $formOtherDetails->total_no_of_floors;

if($total_no_of_floors != ''){
$model->total_floors= $total_no_of_floors;
}

$backup_power =  $formOtherDetails->backup_power;
if($backup_power != ''){
    $model->backup_power= $backup_power;
    }


$passenger_lift =  $formOtherDetails->passenger_lift;
if($passenger_lift != ''){
    $model->passenger_lift= $passenger_lift;
    }

$covered_parking =  $formOtherDetails->covered_parking;
if($covered_parking != ''){
    $model->parking= $covered_parking;
    }

$type_of_space =  $formOtherDetails->type_of_space;
if($type_of_space != ''){
    $model->furnished_status= $type_of_space;
    }

$floor_plate_area =  $formOtherDetails->floor_plate_area;
if($floor_plate_area != ''){
    $model->floor_plate_area= $floor_plate_area;
    }

$security_deposit =  $formOtherDetails->security_deposit;
if($security_deposit != ''){
    $model->security_deposit= $security_deposit;
    }


    $building_name =  $formOtherDetails->building_name;
if($building_name != ''){
    $model->building_name= $building_name;
    }

}

    


/* @var $this yii\web\View */
/* @var $model common\models\Addpropertypm */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="addpropertypm-form">
<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="col-md-3">
    <?php echo $form->field($model, 'user_id')->textInput() ?>
    </div>
    <div class="col-md-3">
    <?php echo $form->field($model, 'role_id')->dropDownList([ 'seller' => 'Seller', 'lessor' => 'Lessor', ], ['prompt' => '']) ?>
    </div>
    <div class="col-md-3">
    <?php echo $form->field($model, 'building_name')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'property_for')->dropDownList([ 'sale' => 'Sale', 'rent' => 'Rent', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
<?=
$form->field($model, 'project_type_id')->dropDownList(ArrayHelper::map(PropertyType::find()->where(['undercategory' => "Commercial", 'isactive' => 1])->all(), 'id', 'typename'), [
'prompt' => 'Select Property  type',

'class' => 'form-control count'

])->label('Select Property Type');
?>                  
                
                </div>

<div class="col-md-3">
    <?php echo $form->field($model, 'request_for')->dropDownList([ 'bid' => 'Bid', 'direct' => 'Direct', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'featured_image')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'featured_video')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'city')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'locality')->textarea(['rows' => 1]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'address')->textarea(['rows' => 1]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'longitude')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'latitude')->textInput() ?>
</div>
<div class="col-md-3" id="addpropertypm-expected_prices">  
    <?php echo $form->field($model, 'expected_price')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3" id="addpropertypm-asking_rental_prices">
    <?php echo $form->field($model, 'asking_rental_price')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-md-3" id="addpropertypm-total_lease_rates">
    <?php echo $form->field($model, 'total_lease_rate')->textInput() ?>
</div>

<div class="col-md-3">
    <?php echo $form->field($model, 'price_sq_ft')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'price_acres')->textInput() ?>
</div>
<div class="col-md-3" id="addpropertypm-price_negotiables">
    <?php echo $form->field($model, 'price_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'revenue_lauout')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'present_status')->dropDownList([ 'agriculture' => 'Agriculture', 'R_zone' => 'R zone', 'institutional' => 'Institutional', 'warehousing' => 'Warehousing', 'others' => 'Others', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'jurisdiction_development')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'shed_RCC')->dropDownList([ 'Shed' => 'Shed', 'RCC' => 'RCC', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'maintenance_cost')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'maintenance_by')->dropDownList([ 'monthly' => 'Monthly', 'annually' => 'Annually', 'one_time' => 'One time', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'annual_dues_payable')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'expected_rental')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'membership_charge')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'availability')->dropDownList([ 'under_construction' => 'Under construction', 'ready_to_move' => 'Ready to move', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'available_from')->dropDownList([ 'Immediate' => 'Immediate', 'Date' => 'Date', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'available_date')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'age_of_property')->dropDownList([ '0-1' => '0-1', '1-5' => '1-5', '5-10' => '5-10', '10+' => '10+', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'possesion_by')->dropDownList([ 'Immediate' => 'Immediate', '30 Days' => '30 Days', '45 Days' => '45 Days', '60 Days' => '60 Days', '90 Days' => '90 Days', '6 Months' => '6 Months', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'rental_type')->dropDownList([ 'monthly' => 'Monthly', 'annualy' => 'Annualy', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'ownership')->dropDownList([ 'freehold' => 'Freehold', 'lease_hold' => 'Lease hold', 'cooperative_society' => 'Cooperative society', 'power_of_attorney' => 'Power of attorney', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'ownership_status')->dropDownList([ 'HUF' => 'HUF', 'Single_Owner' => 'Single Owner', 'Multiple_Owner' => 'Multiple Owner', 'Company' => 'Company', 'Panchayat' => 'Panchayat', 'Others' => 'Others', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'facing')->dropDownList([ 'north' => 'North', 'west' => 'West', 'south' => 'South', 'east' => 'East', 'north_east' => 'North east', 'south_east' => 'South east', 'north_west' => 'North west', 'south_west' => 'South west', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'total_floors')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'LOAN_taken')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'super_area')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'super_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'carpet_area')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'carpet_unit')->dropDownList([ 'sq_feets' => 'Sq feets', 'sq_yards' => 'Sq yards', 'sq_meters' => 'Sq meters', ], ['prompt' => '']) ?>
</div>

<div class="col-md-3">
    <?php echo $form->field($model, 'efficiency')->textInput() ?>
</div>

<div class="col-md-3">
    <?php echo $form->field($model, 'total_floors')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'property_on_floor')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'configuration')->dropDownList([ '1bhk' => '1bhk', '2bhk' => '2bhk', '3bhk' => '3bhk', '4bhk' => '4bhk', '5bhk' => '5bhk', '>5bhk' => '>5bhk', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'floors_allowed_construction')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'passenger_lift')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'security_deposit')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'floor_plate_area')->textInput() ?>
</div>

<div class="col-md-3">
    <?php echo $form->field($model, 'furnished_status')->dropDownList([ 'furnished' => 'Furnished', 'semi_furnished' => 'Semi furnished', 'bareshell' => 'Bareshell', 'raw' => 'Raw', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'parking')->textInput() ?>
</div>

<div class="col-md-3">
    <?php echo $form->field($model, 'backup_power')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'is_active')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'created_date')->textInput() ?>
</div>
<div class="col-md-3">
    <?php echo $form->field($model, 'status')->dropDownList([ 'approved' => 'Approved', 'pending' => 'Pending', 'onhold' => 'Onhold', 'reviewed' => 'Reviewed', ], ['prompt' => '']) ?>
</div>
<div class="col-md-12">
    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>
</div>
</div>



<?php
$script = <<< JS


var propertyfor = $('#addpropertypm-property_for').val();

if(propertyfor == 'sale'){

$('#addpropertypm-asking_rental_prices').hide();
$('#addpropertypm-total_lease_rates').hide();
$('#addpropertypm-price_negotiables').hide();

$('#addpropertypm-expected_prices').show();


}else if(propertyfor == 'rent'){
$('#addpropertypm-asking_rental_prices').show();
$('#addpropertypm-total_lease_rates').show();
$('#addpropertypm-price_negotiables').show();

$('#addpropertypm-expected_prices').hide();
}else{
$('#addpropertypm-asking_rental_prices').show();
$('#addpropertypm-total_lease_rates').show();
$('#addpropertypm-price_negotiables').show();

$('#addpropertypm-expected_prices').show();
}



var super_area =  $('#addpropertypm-super_area').val();
var carpet_area = $('#addpropertypm-carpet_area').val();

if(super_area != '' && carpet_area != ''){
  
var efficiency  =  carpet_area/super_area;
var efficiencypercent = Math.round(efficiency*100);  
$('#addpropertypm-efficiency').val(efficiencypercent);
}



var super_area =  $('#addpropertypm-super_area').val();
var asking_rental_price =  $('#addpropertypm-asking_rental_price').val();


if(super_area != '' && asking_rental_price != ''){

var total_lease_rate  =  asking_rental_price *   super_area;    
  
var total_lease_rate = Math.round(total_lease_rate);  
$('#addpropertypm-total_lease_rate').val(total_lease_rate);
}



$('#addpropertypm-total_lease_rate').blur(function(){



var super_area =  $('#addpropertypm-super_area').val();
var total_lease_rate = $(this).val();

if(super_area != '' && total_lease_rate != ''){

var asking_lease_rate  =  total_lease_rate/super_area;
var efficiencypercent = Math.round(asking_lease_rate);  
$('#addpropertypm-asking_rental_price').val(efficiencypercent);
}

});





$('#addpropertypm-property_for').change(function(){

if(propertyfor == 'sale'){

$('#addpropertypm-asking_rental_prices').hide();
$('#addpropertypm-total_lease_rates').hide();
$('#addpropertypm-price_negotiables').hide();

$('#addpropertypm-expected_prices').show();


}else if(propertyfor == 'rent'){
$('#addpropertypm-asking_rental_prices').show();
$('#addpropertypm-total_lease_rates').show();
$('#addpropertypm-price_negotiables').show();

$('#addpropertypm-expected_prices').hide();
}else{
$('#addpropertypm-asking_rental_prices').show();
$('#addpropertypm-total_lease_rates').show();
$('#addpropertypm-price_negotiables').show();

$('#addpropertypm-expected_prices').show();
}

});






JS;
$this->registerJs($script);
?> 




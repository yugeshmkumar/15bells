<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Property */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'roleid')->textInput() ?>

    <?= $form->field($model, 'projectypeid')->textInput() ?>

    <?= $form->field($model, 'propertydescr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'property_for')->dropDownList([ 'Sale' => 'Sale', 'Rent' => 'Rent', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'locality')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'city')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'state')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'country')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'property_features')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'building_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'building_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'totalrooms')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalfloors')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'floorno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'totalbalconies')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'furnishedstatus')->dropDownList([ 'Furnished' => 'Furnished', 'Un-Furnished' => 'Un-Furnished', 'Semi-Furnished' => 'Semi-Furnished', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'on_road')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'walls_made')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'office_space_shared')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'personal_washrooms')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pantry_available')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', 'Combined' => 'Combined', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total_area')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'built-up_area')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'carpet_area')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'expected_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_per_sqft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintaince_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintaince_by')->dropDownList([ 'Monthly' => 'Monthly', 'Annualy' => 'Annualy', 'Weekly' => 'Weekly', 'Quaterly' => 'Quaterly', 'Onetime' => 'Onetime', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'include_stamp_reg_charges')->dropDownList([ 'New Property' => 'New Property', 'Resale' => 'Resale', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'brokers_response')->dropDownList([ 'Under Construction' => 'Under Construction', 'Ready to Move' => 'Ready to Move', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'available_from_month')->dropDownList([ 'Jan' => 'Jan', 'Feb' => 'Feb', 'Mar' => 'Mar', 'Apr' => 'Apr', 'May' => 'May', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Aug', 'Sept' => 'Sept', 'Oct' => 'Oct', 'Nov' => 'Nov', 'Dec' => 'Dec', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'available_from_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_updated')->textInput() ?>

    <?= $form->field($model, 'visibility_flags')->textInput() ?>

    <?= $form->field($model, 'marketing_flags')->textInput() ?>

    <?= $form->field($model, 'ratings')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'count_views')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'property_status_flags')->textInput() ?>

    <?= $form->field($model, 'featured_image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'featured_thumbnails_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'marketing_cost')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'registry_cost')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'electricity_charges')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'maintainces_charges')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deposite_amount')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rules_regulations')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'notice_period')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'isactive')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

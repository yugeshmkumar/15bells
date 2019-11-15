<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'roleid') ?>

    <?= $form->field($model, 'projectypeid') ?>

    <?= $form->field($model, 'propertydescr') ?>

    <?php // echo $form->field($model, 'property_for') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'locality') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'property_features') ?>

    <?php // echo $form->field($model, 'building_no') ?>

    <?php // echo $form->field($model, 'building_name') ?>

    <?php // echo $form->field($model, 'totalrooms') ?>

    <?php // echo $form->field($model, 'totalfloors') ?>

    <?php // echo $form->field($model, 'floorno') ?>

    <?php // echo $form->field($model, 'totalbalconies') ?>

    <?php // echo $form->field($model, 'furnishedstatus') ?>

    <?php // echo $form->field($model, 'on_road') ?>

    <?php // echo $form->field($model, 'walls_made') ?>

    <?php // echo $form->field($model, 'office_space_shared') ?>

    <?php // echo $form->field($model, 'personal_washrooms') ?>

    <?php // echo $form->field($model, 'pantry_available') ?>

    <?php // echo $form->field($model, 'total_area') ?>

    <?php // echo $form->field($model, 'built-up_area') ?>

    <?php // echo $form->field($model, 'carpet_area') ?>

    <?php // echo $form->field($model, 'expected_price') ?>

    <?php // echo $form->field($model, 'price_per_sqft') ?>

    <?php // echo $form->field($model, 'maintaince_cost') ?>

    <?php // echo $form->field($model, 'maintaince_by') ?>

    <?php // echo $form->field($model, 'include_stamp_reg_charges') ?>

    <?php // echo $form->field($model, 'brokers_response') ?>

    <?php // echo $form->field($model, 'available_from_month') ?>

    <?php // echo $form->field($model, 'available_from_year') ?>

    <?php // echo $form->field($model, 'last_updated') ?>

    <?php // echo $form->field($model, 'visibility_flags') ?>

    <?php // echo $form->field($model, 'marketing_flags') ?>

    <?php // echo $form->field($model, 'ratings') ?>

    <?php // echo $form->field($model, 'count_views') ?>

    <?php // echo $form->field($model, 'property_status_flags') ?>

    <?php // echo $form->field($model, 'featured_image') ?>

    <?php // echo $form->field($model, 'featured_thumbnails_id') ?>

    <?php // echo $form->field($model, 'marketing_cost') ?>

    <?php // echo $form->field($model, 'registry_cost') ?>

    <?php // echo $form->field($model, 'electricity_charges') ?>

    <?php // echo $form->field($model, 'maintainces_charges') ?>

    <?php // echo $form->field($model, 'deposite_amount') ?>

    <?php // echo $form->field($model, 'rules_regulations') ?>

    <?php // echo $form->field($model, 'notice_period') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'isactive') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

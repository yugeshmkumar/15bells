<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AddpropertypmSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="addpropertypm-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'user_id') ?>

    <?php echo $form->field($model, 'role_id') ?>

    <?php echo $form->field($model, 'project_name') ?>

    <?php echo $form->field($model, 'property_for') ?>

    <?php // echo $form->field($model, 'project_type_id') ?>

    <?php // echo $form->field($model, 'request_for') ?>

    <?php // echo $form->field($model, 'featured_image') ?>

    <?php // echo $form->field($model, 'featured_video') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'locality') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'total_plot_area') ?>

    <?php // echo $form->field($model, 'plot_unit') ?>

    <?php // echo $form->field($model, 'expected_price') ?>

    <?php // echo $form->field($model, 'asking_rental_price') ?>

    <?php // echo $form->field($model, 'price_sq_ft') ?>

    <?php // echo $form->field($model, 'price_acres') ?>

    <?php // echo $form->field($model, 'price_negotiable') ?>

    <?php // echo $form->field($model, 'revenue_lauout') ?>

    <?php // echo $form->field($model, 'present_status') ?>

    <?php // echo $form->field($model, 'jurisdiction_development') ?>

    <?php // echo $form->field($model, 'shed_RCC') ?>

    <?php // echo $form->field($model, 'maintenance_cost') ?>

    <?php // echo $form->field($model, 'maintenance_by') ?>

    <?php // echo $form->field($model, 'annual_dues_payable') ?>

    <?php // echo $form->field($model, 'expected_rental') ?>

    <?php // echo $form->field($model, 'membership_charge') ?>

    <?php // echo $form->field($model, 'availability') ?>

    <?php // echo $form->field($model, 'available_from') ?>

    <?php // echo $form->field($model, 'available_date') ?>

    <?php // echo $form->field($model, 'age_of_property') ?>

    <?php // echo $form->field($model, 'possesion_by') ?>

    <?php // echo $form->field($model, 'rental_type') ?>

    <?php // echo $form->field($model, 'ownership') ?>

    <?php // echo $form->field($model, 'ownership_status') ?>

    <?php // echo $form->field($model, 'facing') ?>

    <?php // echo $form->field($model, 'FAR_approval') ?>

    <?php // echo $form->field($model, 'LOAN_taken') ?>

    <?php // echo $form->field($model, 'buildup_area') ?>

    <?php // echo $form->field($model, 'build_unit') ?>

    <?php // echo $form->field($model, 'carpet_area') ?>

    <?php // echo $form->field($model, 'carpet_unit') ?>

    <?php // echo $form->field($model, 'total_floors') ?>

    <?php // echo $form->field($model, 'property_on_floor') ?>

    <?php // echo $form->field($model, 'configuration') ?>

    <?php // echo $form->field($model, 'floors_allowed_construction') ?>

    <?php // echo $form->field($model, 'bedrooms') ?>

    <?php // echo $form->field($model, 'bathrooms') ?>

    <?php // echo $form->field($model, 'balconies') ?>

    <?php // echo $form->field($model, 'pooja_room') ?>

    <?php // echo $form->field($model, 'study_room') ?>

    <?php // echo $form->field($model, 'servant_room') ?>

    <?php // echo $form->field($model, 'other_room') ?>

    <?php // echo $form->field($model, 'furnished_status') ?>

    <?php // echo $form->field($model, 'parking') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

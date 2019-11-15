<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AddpropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addproperty-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'role_id') ?>

    <?= $form->field($model, 'project_name') ?>

    <?= $form->field($model, 'project_type_id') ?>

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

    <?php // echo $form->field($model, 'price_sq_ft') ?>

    <?php // echo $form->field($model, 'price_acres') ?>

    <?php // echo $form->field($model, 'all_inclusive_price') ?>

    <?php // echo $form->field($model, 'price_negotiable') ?>

    <?php // echo $form->field($model, 'revenue_lauout') ?>

    <?php // echo $form->field($model, 'present_status') ?>

    <?php // echo $form->field($model, 'jurisdiction_development') ?>

    <?php // echo $form->field($model, 'shed_RCC') ?>

    <?php // echo $form->field($model, 'maintenance_cost') ?>

    <?php // echo $form->field($model, 'maintenance_by') ?>

    <?php // echo $form->field($model, 'annual_dues_payable') ?>

    <?php // echo $form->field($model, 'expected_rental') ?>

    <?php // echo $form->field($model, 'availability') ?>

    <?php // echo $form->field($model, 'age_of_property') ?>

    <?php // echo $form->field($model, 'possesion_by') ?>

    <?php // echo $form->field($model, 'transaction_type') ?>

    <?php // echo $form->field($model, 'ownership') ?>

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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

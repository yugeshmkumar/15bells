<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaveSearchesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="save-searches-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'role_type') ?>

    <?= $form->field($model, 'search_for') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'geometry') ?>

    <?php // echo $form->field($model, 'radius') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'location_name') ?>

    <?php // echo $form->field($model, 'town') ?>

    <?php // echo $form->field($model, 'sector') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'property_type') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'area_unit') ?>

    <?php // echo $form->field($model, 'min_prices') ?>

    <?php // echo $form->field($model, 'max_prices') ?>

    <?php // echo $form->field($model, 'property_auction_type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SaveSearches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="save-searches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_type')->dropDownList([ 'lessee' => 'Lessee', 'buyer' => 'Buyer', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'search_for')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'geometry')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'radius')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'location_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'town')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'property_type')->textInput() ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'area_unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_prices')->textInput() ?>

    <?= $form->field($model, 'max_prices')->textInput() ?>

    <?= $form->field($model, 'property_auction_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="myprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->dropDownList([ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emailid')->textInput() ?>

    <?= $form->field($model, 'mobileid')->textInput() ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', 'other' => 'Other', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'martial_status')->dropDownList([ 'Married' => 'Married', 'Un-Married' => 'Un-Married', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'minor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'relatnshp_with_minor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'guardian_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pan_card_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adhar_card_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'current_country')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'current_state')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'current_city')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'current_pincode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permanent_country')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'permanent_state')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'permanent_city')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'permanent_pincode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isactive')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

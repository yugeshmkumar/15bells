<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfileEx */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profile-ex-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'title')->dropDownList([ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'emailid')->textInput() ?>

    <?= $form->field($model, 'mobileid')->textInput() ?>

    <?= $form->field($model, 'cur_addressid1')->textInput() ?>

    <?= $form->field($model, 'per_addressid1')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pan_card_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adhar_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'isActive')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

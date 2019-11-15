<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfileEx */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-profile-ex-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'title')->dropDownList([ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'emailid')->textInput() ?>

    <?php echo $form->field($model, 'mobileid')->textInput() ?>

    <?php echo $form->field($model, 'cur_addressid1')->textInput() ?>

    <?php echo $form->field($model, 'per_addressid1')->textInput() ?>

    <?php echo $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'pan_card_number')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'adhar_number')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'dob')->textInput() ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'isActive')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Myprofile */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="myprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'userID')->textInput() ?>

    <?php echo $form->field($model, 'title')->dropDownList([ 'Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'middlename')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'nationality')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'emailid')->textInput() ?>

    <?php echo $form->field($model, 'mobileid')->textInput() ?>

    <?php echo $form->field($model, 'dob')->textInput() ?>

    <?php echo $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', 'other' => 'Other', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'martial_status')->dropDownList([ 'Married' => 'Married', 'Un-Married' => 'Un-Married', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'isMinor')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'relatnshp_with_minor')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'guardian_name')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'pan_card_no')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'adhar_card_no')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'countryverificatn')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'passportno')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'pionumber')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'ocinumber')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'current_country')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'current_state')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'current_city')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'current_pincode')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'current_address')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'permanent_country')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'permanent_state')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'permanent_city')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'permanent_pincode')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'permanent_address')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'isactive')->textInput() ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

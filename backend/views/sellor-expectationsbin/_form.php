<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SellorExpectationsbin */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="sellor-expectationsbin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput() ?>

    <?php echo $form->field($model, 'user_type')->dropDownList([ 'sellor' => 'Sellor', 'buyer' => 'Buyer', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'property_id')->textInput() ?>

    <?php echo $form->field($model, 'save_search_as')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'expected_rate')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'rate_negotiable')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'payment_time')->textInput() ?>

    <?php echo $form->field($model, 'payment_time_negotiable')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'loan_against_property')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'all_dues_cleared')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'vastu_facing')->dropDownList([ 'North' => 'North', 'South' => 'South', 'East' => 'East', 'West' => 'West', 'North-East' => 'North-East', 'South-East' => 'South-East', 'North-West' => 'North-West', 'South-West' => 'South-West', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'loan_to_be_applied')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'is_active')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

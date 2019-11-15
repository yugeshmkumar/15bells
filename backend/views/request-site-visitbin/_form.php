<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RequestSiteVisitbin */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="request-site-visitbin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'property_id')->textInput() ?>

    <?php echo $form->field($model, 'company_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'request_status')->dropDownList([ 'requested' => 'Requested', 'scheduled' => 'Scheduled', 'confirmed' => 'Confirmed', 'completed' => 'Completed', 'rejected' => 'Rejected', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'scheduled_time')->textInput() ?>

    <?php echo $form->field($model, 'confirm')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'created_date')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

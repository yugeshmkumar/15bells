<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadrequest */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="leadrequest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'UserID')->textInput() ?>

    <?php echo $form->field($model, 'tagsData')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'requestName')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'requestEmail')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'requestAmount')->textInput() ?>

    <?php echo $form->field($model, 'requestBank')->textInput() ?>

    <?php echo $form->field($model, 'teleNo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'dob')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'Type')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'OtherFields')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'sourceName')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'sourceID')->textInput() ?>

    <?php echo $form->field($model, 'currentStatus')->textInput() ?>

    <?php echo $form->field($model, 'currentCsrID')->textInput() ?>

    <?php echo $form->field($model, 'lastTouch')->textInput() ?>

    <?php echo $form->field($model, 'currentLeadScore')->textInput() ?>

    <?php echo $form->field($model, 'leadQuality')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'loanleadSourceDetailsID')->textInput() ?>

    <?php echo $form->field($model, 'appliedProductid')->textInput() ?>

    <?php echo $form->field($model, 'speciallead')->dropDownList([ 'yes' => 'Yes', 'no' => 'No', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'currentloandatastatusid')->textInput() ?>

    <?php echo $form->field($model, 'rquestMessage')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'applyDate')->textInput() ?>

    <?php echo $form->field($model, 'CreateDate')->textInput() ?>

    <?php echo $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'is_duplicate')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="leadassignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'leadid')->textInput() ?>

    <?php echo $form->field($model, 'lead_current_status_ID')->textInput() ?>

    <?php echo $form->field($model, 'assigned_toID')->textInput() ?>

    <?php echo $form->field($model, 'currentstar')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['prompt' => '']) ?>

    <?php echo $form->field($model, 'isactive')->textInput() ?>

    <?php echo $form->field($model, 'created_at')->textInput() ?>

    <?php echo $form->field($model, 'updated_at')->textInput() ?>

    <?php echo $form->field($model, 'assigned_at')->textInput() ?>

    <?php echo $form->field($model, 'unassigned_at')->textInput() ?>

    <?php echo $form->field($model, 'old_assigned_to')->textInput() ?>

    <?php echo $form->field($model, 'reassigned_at')->textInput() ?>

    <?php echo $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

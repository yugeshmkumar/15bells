<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leadassignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leadassignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lead_current_status_ID')->textInput() ?>

    <?= $form->field($model, 'assigned_toID')->textInput() ?>

    <?= $form->field($model, 'currentstar')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'isactive')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'assigned_at')->textInput() ?>

    <?= $form->field($model, 'unassigned_at')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

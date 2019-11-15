<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\comm\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'messagechannelID')->textInput() ?>

    <?= $form->field($model, 'algoID')->textInput() ?>

    <?= $form->field($model, 'message_type')->dropDownList([ 'onetime' => 'Onetime', 'recurring' => 'Recurring', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'recurring_no')->dropDownList([ 'minutes' => 'Minutes', 'hourly' => 'Hourly', 'days' => 'Days', 'weeks' => 'Weeks', 'months' => 'Months', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'attach_file_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attach_file_path')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attach_file_original_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'isactive')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

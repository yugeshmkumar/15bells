<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Phonenumbers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phonenumbers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phonetype')->dropDownList([ 'Mobile' => 'Mobile', 'Work' => 'Work', 'Home' => 'Home', 'Main' => 'Main', 'Work Fax' => 'Work Fax', 'Home Fax' => 'Home Fax', 'Pager' => 'Pager', 'Other' => 'Other', 'Custom' => 'Custom', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'isdefault')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'isActive')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

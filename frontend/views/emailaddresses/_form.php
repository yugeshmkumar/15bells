<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Emailaddresses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emailaddresses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emailaddress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'emailtype')->dropDownList([ 'Work' => 'Work', 'Home' => 'Home', 'Custom' => 'Custom', 'Other' => 'Other', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'isdefault')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'isactive')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
